-- Database: dfmrhd182q3fsf

-- DROP DATABASE dfmrhd182q3fsf;

CREATE DATABASE DATABASENAME
    WITH 
    OWNER = MYUSER
    ENCODING = 'UTF8'
    LC_COLLATE = 'en_US.UTF-8'
    LC_CTYPE = 'en_US.UTF-8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

GRANT ALL ON DATABASE DATABASENAME TO MYUSER;

CREATE TABLE public.players
(
    "playerPk" integer NOT NULL DEFAULT nextval('"players_playerPk_seq"'::regclass),
    "championId" bigint,
    CONSTRAINT players_pkey PRIMARY KEY ("playerPk")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.players
    OWNER to fghpforzkqxpbh;

    -- Table: public.usersv2

-- DROP TABLE public.usersv2;

CREATE TABLE public.usersv2
(
    "usersv2_PK" integer NOT NULL DEFAULT nextval('"usersv2_usersv2_PK_seq"'::regclass),
    "playerID" integer,
    "summonerName" character(255) COLLATE pg_catalog."default",
    CONSTRAINT usersv2_pkey PRIMARY KEY ("usersv2_PK"),
    CONSTRAINT "PlayerId_FK" FOREIGN KEY ("playerID")
        REFERENCES public.players ("playerPk") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.usersv2
    OWNER to fghpforzkqxpbh;