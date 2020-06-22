--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table VILLES
--------------------------------------------------------

  CREATE TABLE "SYSTEM"."VILLES" 
   (	"ID" NUMBER(19,0), 
	"NAME" VARCHAR2(255 BYTE), 
	"REGION_ID" NUMBER(19,0)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
REM INSERTING into SYSTEM.VILLES
SET DEFINE OFF;
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('1','Tanger','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('2','MDiq-Fnidq','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('3','Chefchaouen ','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('4','Fahs?Anjra','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('5','Larache ','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('6','Tétouan ','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('7','Ouezzane ','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('8','Al Hoceima ','1');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('9','Oujda','2');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('10','Berkane  ','2');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('11','Nador','2');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('12','Driouch','2');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('13','Guercif','2');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('14','Meknès','3');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('15','Fès','3');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('16','El Hajeb','3');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('17','Ifrane','3');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('18','Sefrou ','3');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('19','Rabat','4');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('20','Salé','4');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('21','Kénitra','4');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('22','Sidi Kacem','4');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('23','Azilal','5');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('24','Béni Mellal','5');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('25','Khénifra','5');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('26','Khouribga','5');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('27','Casablanca','6');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('28','Mohammedia','6');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('29','El Jadida','6');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('30','Settat','6');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('31','Berrechid','6');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('32','Marrakech','7');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('33','Essaouira','7');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('34','Safi','7');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('35','Errachidia','8');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('36','Ouarzazate','8');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('37','Zagora','8');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('38','Agadir','9');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('39','Taroudant','9');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('40','Tata','9');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('41','Guelmim','10');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('42','Tan?Tan','10');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('43','Sidi Ifni','10');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('44','Es Semara','11');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('45','Boujdour','11');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('46','Laâyoune','11');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('47','Tarfaya','11');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('48','Dakhla','12');
Insert into SYSTEM.VILLES (ID,NAME,REGION_ID) values ('49','Oued Eddahab','12');
--------------------------------------------------------
--  DDL for Index VILLES_ID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "SYSTEM"."VILLES_ID_PK" ON "SYSTEM"."VILLES" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Trigger VILLES_ID_TRG
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TRIGGER "SYSTEM"."VILLES_ID_TRG" 
            before insert on VILLES
            for each row
                begin
            if :new.ID is null then
                select villes_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "SYSTEM"."VILLES_ID_TRG" ENABLE;
--------------------------------------------------------
--  Constraints for Table VILLES
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."VILLES" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "SYSTEM"."VILLES" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "SYSTEM"."VILLES" MODIFY ("REGION_ID" NOT NULL ENABLE);
  ALTER TABLE "SYSTEM"."VILLES" ADD CONSTRAINT "VILLES_ID_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table VILLES
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."VILLES" ADD CONSTRAINT "VILLES_REGION_ID_FK" FOREIGN KEY ("REGION_ID")
	  REFERENCES "SYSTEM"."REGIONS" ("ID") ENABLE;
