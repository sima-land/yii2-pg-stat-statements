/**
 * SQLite
 */

DROP TABLE IF EXISTS "aggregate_pg_stat_statements";

CREATE TABLE aggregate_pg_stat_statements (
  id INTEGER PRIMARY KEY NOT NULL,
  created_at TIMESTAMP WITH TIME ZONE, -- Время создания записи
  server CHARACTER VARYING(20) NOT NULL, -- Имя сервера, отправившего данные
  userid INTEGER NOT NULL, -- OID пользователя, выполнявшего оператор
  dbid INTEGER NOT NULL, -- OID базы данных, в которой выполнялся оператор
  queryid BIGINT NOT NULL, -- Внутренний хеш-код, вычисленный по дереву разбора оператора
  query TEXT NOT NULL, -- Текст, представляющий оператор
  calls BIGINT NOT NULL, -- Число выполнений
  total_time DOUBLE PRECISION NOT NULL, -- Общее время, потраченное на оператор, в миллисекундах
  min_time DOUBLE PRECISION NOT NULL, -- Минимальное время, потраченное на оператор, в миллисекундах
  max_time DOUBLE PRECISION NOT NULL, -- Максимальное время, потраченное на оператор, в миллисекундах
  mean_time DOUBLE PRECISION NOT NULL, -- Среднее время, потраченное на оператор, в миллисекундах
  stddev_time DOUBLE PRECISION NOT NULL, -- Стандартное отклонение во времени, потраченном на оператор, в миллисекундах
  rows BIGINT NOT NULL, -- Общее число строк, полученных или затронутых оператором
  shared_blks_hit BIGINT NOT NULL, -- Общее число попаданий в разделяемый кеш блоков для данного оператора
  shared_blks_read BIGINT NOT NULL, -- Общее число чтений разделяемых блоков для данного оператора
  shared_blks_dirtied BIGINT NOT NULL, -- Общее число разделяемых блоков, «загрязнённых» данным оператором
  shared_blks_written BIGINT NOT NULL, -- Общее число разделяемых блоков, записанных данным оператором
  local_blks_hit BIGINT NOT NULL, -- Общее число попаданий в локальный кеш блоков для данного оператора
  local_blks_read BIGINT NOT NULL, -- Общее число чтений локальных блоков для данного оператора
  local_blks_dirtied BIGINT NOT NULL, -- Общее число локальных блоков, «загрязнённых» данным оператором
  local_blks_written BIGINT NOT NULL, -- Общее число локальных блоков, записанных данным оператором
  temp_blks_read BIGINT NOT NULL, -- Общее число чтений временных блоков для данного оператора
  temp_blks_written BIGINT NOT NULL, -- Общее число записей временных блоков для данного оператора
  blk_read_time DOUBLE PRECISION NOT NULL, -- Общее время, потраченное оператором на чтение блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)
  blk_write_time DOUBLE PRECISION NOT NULL -- Общее время, потраченное оператором на запись блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)
);

DROP TABLE IF EXISTS "pg_stat_statements";

CREATE TABLE pg_stat_statements (
  userid INTEGER NOT NULL, -- OID пользователя, выполнявшего оператор
  dbid INTEGER NOT NULL, -- OID базы данных, в которой выполнялся оператор
  queryid BIGINT NOT NULL, -- Внутренний хеш-код, вычисленный по дереву разбора оператора
  query TEXT NOT NULL, -- Текст, представляющий оператор
  calls BIGINT NOT NULL, -- Число выполнений
  total_time DOUBLE PRECISION NOT NULL, -- Общее время, потраченное на оператор, в миллисекундах
  min_time DOUBLE PRECISION NOT NULL, -- Минимальное время, потраченное на оператор, в миллисекундах
  max_time DOUBLE PRECISION NOT NULL, -- Максимальное время, потраченное на оператор, в миллисекундах
  mean_time DOUBLE PRECISION NOT NULL, -- Среднее время, потраченное на оператор, в миллисекундах
  stddev_time DOUBLE PRECISION NOT NULL, -- Стандартное отклонение во времени, потраченном на оператор, в миллисекундах
  rows BIGINT NOT NULL, -- Общее число строк, полученных или затронутых оператором
  shared_blks_hit BIGINT NOT NULL, -- Общее число попаданий в разделяемый кеш блоков для данного оператора
  shared_blks_read BIGINT NOT NULL, -- Общее число чтений разделяемых блоков для данного оператора
  shared_blks_dirtied BIGINT NOT NULL, -- Общее число разделяемых блоков, «загрязнённых» данным оператором
  shared_blks_written BIGINT NOT NULL, -- Общее число разделяемых блоков, записанных данным оператором
  local_blks_hit BIGINT NOT NULL, -- Общее число попаданий в локальный кеш блоков для данного оператора
  local_blks_read BIGINT NOT NULL, -- Общее число чтений локальных блоков для данного оператора
  local_blks_dirtied BIGINT NOT NULL, -- Общее число локальных блоков, «загрязнённых» данным оператором
  local_blks_written BIGINT NOT NULL, -- Общее число локальных блоков, записанных данным оператором
  temp_blks_read BIGINT NOT NULL, -- Общее число чтений временных блоков для данного оператора
  temp_blks_written BIGINT NOT NULL, -- Общее число записей временных блоков для данного оператора
  blk_read_time DOUBLE PRECISION NOT NULL, -- Общее время, потраченное оператором на чтение блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)
  blk_write_time DOUBLE PRECISION NOT NULL -- Общее время, потраченное оператором на запись блоков, в миллисекундах (если включён track_io_timing, или ноль в противном случае)
);

INSERT INTO "pg_stat_statements" VALUES
(16386,	16391, 858881697,	'SELECT * FROM "item" WHERE id=1',	135,	356.3350000000001,	0.156,	19.134999999999998,
2.6395185185185186,	3.367186883574526,	223,	68900,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0),
(16386,	16391, 858881697,	'SELECT * FROM "attr" WHERE id=1',	135,	356.3350000000001,	0.156,	19.134999999999998,
2.7777777777777,	3.367186883574526,	223,	68900,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0),
(16386,	16391, 858881697,	'SELECT * FROM "book" WHERE id=1',	135,	356.3350000000001,	0.156,	19.134999999999998,
2.5555555555555,	3.367186883574526,	223,	68900,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0);