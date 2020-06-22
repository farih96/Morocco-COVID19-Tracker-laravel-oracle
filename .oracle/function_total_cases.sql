--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function TOTAL_CASES
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE FUNCTION "SYSTEM"."TOTAL_CASES" 
RETURN CASES_OBJ_TYPE AS
    result CASES_OBJ_TYPE;
    CONFIRMED NUMBER(20);
    DEATHS    NUMBER(20);
    RECOVERED NUMBER(20);
    DAY DATE;
    NAME varchar2(20) := 'Morocco';
BEGIN

    SELECT SUM(CONFIRMED), SUM(DEATHS), SUM(RECOVERED), MAX(DAY) into CONFIRMED ,DEATHS ,RECOVERED, DAY 
    FROM CASES;
    result := CASES_OBJ_TYPE(CONFIRMED,DEATHS,RECOVERED,DAY,NAME);
    RETURN result ;
END;

/
