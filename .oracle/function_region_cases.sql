--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function REGION_CASES
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE FUNCTION "SYSTEM"."REGION_CASES" (p_region IN NUMBER)
RETURN CASES_OBJ_TYPE AS
    result CASES_OBJ_TYPE;
    CONFIRMED NUMBER(6);
    DEATHS    NUMBER(6);
    RECOVERED NUMBER(6);
    DAY DATE;
    NAME VARCHAR2(40);

BEGIN
    SELECT SUM(CONFIRMED), SUM(DEATHS), SUM(RECOVERED), MAX(DAY), NAME into CONFIRMED ,DEATHS ,RECOVERED, DAY, NAME 
    FROM CASES, REGIONS WHERE REGION_ID = p_region AND REGIONS.ID = p_region GROUP BY NAME;
    result := CASES_OBJ_TYPE(CONFIRMED,DEATHS,RECOVERED,DAY,NAME);
    RETURN result ;
END;

/
