--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function CASES_PER_REGION
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE FUNCTION "SYSTEM"."CASES_PER_REGION" RETURN total_cases_tbl_type AS

    result        total_cases_tbl_type := total_cases_tbl_type();
    region   cases_obj_type;
    i number(2);

BEGIN
     FOR i in 1 .. 12 LOOP 
     region :=  REGION_CASES(i);
     result.extend;
     result(i) := region;
     END LOOP;
    RETURN result;
END;

/
