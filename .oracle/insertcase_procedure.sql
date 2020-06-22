--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Procedure UPDATECASE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE NONEDITIONABLE PROCEDURE "SYSTEM"."INSERTCASE" (
    
    confirmed   IN   NUMBER,
    recovered   IN   NUMBER,
    deaths      IN   NUMBER,
    DAY         IN DATE,
    ville_id    IN   NUMBER,
    region_id   IN   NUMBER,
) IS
BEGIN

   Insert into CASES (CONFIRMED,DEATHS,RECOVERED,DAY,VILLE_ID,REGION_ID) values (confirmed,deaths,recovered ,DAY,ville_id,region_id);
 
END;

/