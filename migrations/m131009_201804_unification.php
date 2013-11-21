<?php

class m131009_201804_unification extends EDbMigration
{
    public function up()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }

        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        }

        // new statuses: 'draft', 'published', 'archived'
        $statusMap = array(
            0  => 'archived',
            10 => 'draft',
            20 => 'draft',
            30 => 'published',
            40 => 'published',
            50 => 'archived',
            60 => 'archived'
        );

        $this->createTable(
             "_p3_widget_v0_17",
                 array(
                      "id"                      => "pk",
                      // yiiext/status-behavior
                      "status"                  => "varchar(32) NOT NULL",
                      // mikehaertl/translatable (defaults)
                      "alias"                   => "varchar(128) NOT NULL",
                      "default_properties_json" => "text",
                      "default_content_html"    => "text",
                      "name_id"                 => "VARCHAR(64)",
                      "container_id"            => "varchar(128) NOT NULL",
                      "rank"                    => "integer(11) NOT NULL default 0",
                      "request_param"           => "varchar(128) DEFAULT '*'",
                      "action_name"             => "varchar(128) NOT NULL DEFAULT '*'",
                      "controller_id"           => "varchar(128) NOT NULL DEFAULT '*'",
                      "module_id"               => "varchar(128) DEFAULT '*'",
                      "session_param"           => "varchar(128) DEFAULT '*'",
                      // schmunk42/yii-access
                      "access_owner"            => "varchar(64) NOT NULL",
                      "access_domain"           => "varchar(8) NOT NULL",
                      "access_read"             => "varchar(256)",
                      "access_update"           => "varchar(256)",
                      "access_delete"           => "varchar(256)",
                      #"access_append"       => "varchar(256)",
                      // copy behavior
                      "copied_from_id"          => "int(11)",
                      // time
                      "created_at"              => "datetime NULL DEFAULT NULL",
                      "updated_at"              => "datetime NULL DEFAULT NULL",
                 ),
                 $options
        );

        // Schema for table 'p3_widget_translation'
        $this->createTable(
             "_p3_widget_translation_v0_17",
                 array(
                      "id"              => "pk",
                      "p3_widget_id"    => "int(11) NOT NULL",
                      "status"          => "varchar(32) NOT NULL",
                      "language"        => "varchar(8) NOT NULL",
                      "properties_json" => "text",
                      "content_html"    => "text",
                      // schmunk42/yii-access
                      "access_owner"    => "varchar(64) NOT NULL",
                      #"access_domain"       => "varchar(8)", // * DOMAIN ????
                      "access_read"     => "varchar(256)",
                      "access_update"   => "varchar(256)",
                      "access_delete"   => "varchar(256)",
                      #"access_append"       => "varchar(256)",
                      // copy behavior
                      "copied_from_id"  => "int(11)",
                      // time
                      "created_at"      => "datetime NULL DEFAULT NULL",
                      "updated_at"      => "datetime NULL DEFAULT NULL",
                      "FOREIGN KEY(p3_widget_id) REFERENCES _p3_widget_v0_17(id) ON DELETE CASCADE ON UPDATE CASCADE"
                 ),
                 $options
        );

        $this->createIndex('p3_widget_name_id_unique', '_p3_widget_v0_17', 'name_id', true);
        $this->createIndex(
             'p3_widget_translation_id_language_unique',
                 '_p3_widget_translation_v0_17',
                 'p3_widget_id, language',
                 true
        );

        // JOIN all three existing tables, use the first translation as default values
        $sqlStatement = "SELECT p3_widget_meta.*, p3_widget.*,
          p3_widget_translation.properties, p3_widget_translation.content, p3_widget_translation.language as t_lang
            FROM p3_widget
            LEFT JOIN p3_widget_meta ON p3_widget_meta.id = p3_widget.id
            LEFT JOIN p3_widget_translation ON p3_widget_translation.p3_widget_id =
              (SELECT
                MIN(p3_widget_translation.p3_widget_id)
                FROM p3_widget_translation
                WHERE p3_widget_translation.p3_widget_id = p3_widget.id)
            GROUP BY p3_widget.id;";
        $command      = $this->dbConnection->createCommand($sqlStatement);
        $command->execute();
        $reader = $command->query();
        $owner  = array();
        foreach ($reader as $row) {
            #var_dump($row);

            $owner[$row['id']]  = ($row['owner']) ? $row['owner'] : 1;
            $status[$row['id']] = ($row['status']) ? $statusMap[$row['status']] : 'draft';

            $row['requestParam'] = str_replace("_ALL", "*", $row['requestParam']);
            $row['actionName']   = str_replace("_ALL", "*", $row['actionName']);
            $row['controllerId'] = str_replace("_ALL", "*", $row['controllerId']);
            $row['moduleId']     = str_replace("_ALL", "*", $row['moduleId']);

            // use language from meta-data, unless the only joined record is not in the application language
            $language = ($row['t_lang'] && ($row['t_lang'] != Yii::app()->language)) ? $row['t_lang'] :
                $row['language'];

            $this->insert(
                 "_p3_widget_v0_17",
                     array(
                          "id"                      => $row['id'],
                          "name_id"                 => null,
                          // mikehaertl/translatable (defaults)
                          "module_id"               => ($row['moduleId']) ? $row['moduleId'] : '*',
                          "controller_id"           => ($row['controllerId']) ? $row['controllerId'] : '*',
                          "action_name"             => ($row['actionName']) ? $row['actionName'] : '*',
                          "request_param"           => $row['requestParam'], // empty values are converted to NULL

                          "session_param"           => ($row['sessionParam']) ? $row['sessionParam'] : '*',
                          "container_id"            => $row['containerId'],
                          "rank"                    => $row['rank'],
                          "alias"                   => $row['alias'],
                          // mikehaertl/translatable (defaults)
                          "default_properties_json" => $row['properties'],
                          "default_content_html"    => $row['content'],
                          // yiiext/status-behavior
                          "status"                  => $status[$row['id']],
                          // schmunk42/yii-access
                          "access_owner"            => $owner[$row['id']],
                          "access_domain"           => $language,
                          "access_read"             => $row['checkAccessRead'],
                          "access_update"           => $row['checkAccessUpdate'],
                          "access_delete"           => $row['checkAccessDelete'],
                          #"access_append"       => $row['checkAccessUpdate'],
                          // copy behavior
                          "copied_from_id"          => null,
                          // time
                          "created_at" => ($row['createdAt'] && $row['createdAt'] != '0000-00-00 00:00:00') ?
                                  $row['createdAt'] : null,
                          "updated_at" => ($row['modifiedAt'] && $row['modifiedAt'] != '0000-00-00 00:00:00') ?
                                  $row['modifiedAt'] : null,
                     )
            );

        }

        $sqlStatement = "SELECT * FROM p3_widget_translation";
        $command      = $this->dbConnection->createCommand($sqlStatement);
        $command->execute();
        $reader = $command->query();
        foreach ($reader as $row) {
            #var_dump($row);
            $this->insert(
                 "_p3_widget_translation_v0_17",
                     array(
                          "id"              => $row['id'],
                          "status"          => $status[$row['p3_widget_id']],
                          "p3_widget_id"    => $row['p3_widget_id'],
                          "language"        => $row['language'],
                          "properties_json" => $row['properties'],
                          "content_html"    => $row['content'],
                          "access_owner"    => $owner[$row['p3_widget_id']],
                     )
            );
        }

        $this->renameTable('p3_widget_translation', '_p3_widget_translation_v0_16');
        $this->renameTable('p3_widget_meta', '_p3_widget_meta_v0_16');
        $this->renameTable('p3_widget', '_p3_widget_v0_16');

        $this->renameTable('_p3_widget_translation_v0_17', 'p3_widget_translation');
        $this->renameTable('_p3_widget_v0_17', 'p3_widget');

        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $this->execute('SET FOREIGN_KEY_CHECKS = 1;');
        }

        echo "\n\n*** IMPORTANT NOTICE ***";
        echo "\nThe existing p3_widget... tables were renamed to _p3_widget...v0_16.\n\n";
    }

    public function down()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        }

        $this->dropTable('p3_widget_translation');
        $this->dropTable('p3_widget');

        $this->renameTable('_p3_widget_v0_16', 'p3_widget');
        $this->renameTable('_p3_widget_meta_v0_16', 'p3_widget_meta');
        $this->renameTable('_p3_widget_translation_v0_16', 'p3_widget_translation');

        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            #$this->execute('SET FOREIGN_KEY_CHECKS = 1;');
        }
    }
}