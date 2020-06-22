--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table REGIONS
--------------------------------------------------------

  CREATE TABLE "SYSTEM"."REGIONS" 
   (	"ID" NUMBER(19,0), 
	"NAME" VARCHAR2(255 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
REM INSERTING into SYSTEM.REGIONS
SET DEFINE OFF;
Insert into SYSTEM.REGIONS (ID,NAME) values ('1','Tanger-Tétouan- Al Hoceima');
Insert into SYSTEM.REGIONS (ID,NAME) values ('2','Oriental');
Insert into SYSTEM.REGIONS (ID,NAME) values ('3','Fès-Meknès');
Insert into SYSTEM.REGIONS (ID,NAME) values ('4','Rabat-Salé-Kénitra');
Insert into SYSTEM.REGIONS (ID,NAME) values ('5','Béni Mellal-Khénifra');
Insert into SYSTEM.REGIONS (ID,NAME) values ('6','Casablanca-Settat');
Insert into SYSTEM.REGIONS (ID,NAME) values ('7','Marrakech-Safi');
Insert into SYSTEM.REGIONS (ID,NAME) values ('8','Drâa?Tafilalet');
Insert into SYSTEM.REGIONS (ID,NAME) values ('9','Sous-Massa');
Insert into SYSTEM.REGIONS (ID,NAME) values ('10','Guelmim-Oued Noun');
Insert into SYSTEM.REGIONS (ID,NAME) values ('11','Laâyoune?Saguia al Hamra');
Insert into SYSTEM.REGIONS (ID,NAME) values ('12','Ed Dakhla?Oued ed Dahab');
--------------------------------------------------------
--  DDL for Index REGIONS_ID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "SYSTEM"."REGIONS_ID_PK" ON "SYSTEM"."REGIONS" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Trigger REGIONS_ID_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "SYSTEM"."REGIONS_ID_TRG" 
            before insert on REGIONS
            for each row
                begin
            if :new.ID is null then
                select regions_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "SYSTEM"."REGIONS_ID_TRG" ENABLE;
--------------------------------------------------------
--  Constraints for Table REGIONS
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."REGIONS" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "SYSTEM"."REGIONS" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "SYSTEM"."REGIONS" ADD CONSTRAINT "REGIONS_ID_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
