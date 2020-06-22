--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Type CASES_OBJ_TYPE
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE TYPE "SYSTEM"."CASES_OBJ_TYPE" 
AS OBJECT(
    CONFIRMED NUMBER(20),
    DEATHS    NUMBER(20),
    RECOVERED NUMBER(20),
    DAY DATE,
    NAME varchar2(40)
    )

create or replace NONEDITIONABLE TYPE TOTAL_CASES_TBL_TYPE
IS TABLE OF CASES_OBJ_TYPE;
/
