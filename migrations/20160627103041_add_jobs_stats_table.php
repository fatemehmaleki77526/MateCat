<?php

use Phinx\Migration\AbstractMigration;

class AddJobsStatsTable extends AbstractMigration
{
    public $sql_up = <<<EOL
CREATE TABLE jobs_stats
(
  id_job INT(11) NOT NULL,
  password VARCHAR(45) NOT NULL,
  fuzzy_band VARCHAR(10) NOT NULL,
  source VARCHAR(45) NOT NULL,
  target VARCHAR(45) NOT NULL,
  total_time_to_edit BIGINT(20) DEFAULT '0' NOT NULL,
  avg_post_editing_effort FLOAT,
  total_raw_wc BIGINT(20) DEFAULT '1',
  CONSTRAINT `PRIMARY` PRIMARY KEY (id_job, password, fuzzy_band)
);
CREATE INDEX fuzzybands__index ON jobs_stats (fuzzy_band);
CREATE INDEX source ON jobs_stats (source);
CREATE INDEX target ON jobs_stats (target);
EOL;


    public $sql_down = 'DROP TABLE jobs_stats';
}
