--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function LAST_7DAYS_CASES
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE FUNCTION "SYSTEM"."LAST_7DAYS_CASES" RETURN total_cases_tbl_type AS

    result        total_cases_tbl_type := total_cases_tbl_type();
    casesinaday   cases_obj_type;
    confirmed     NUMBER(20);
    deaths        NUMBER(20);
    recovered     NUMBER(20);
    i number := 1;
    day           DATE;
    name          VARCHAR2(20) := 'Morocco';
    CURSOR cur_cases IS
    SELECT
        trunc(day),
        SUM(confirmed),
        SUM(deaths),
        SUM(recovered)
    FROM
        cases
    GROUP BY
        trunc(day)
    ORDER BY
        trunc(day) desc
    FETCH FIRST 7 ROWS ONLY;

BEGIN
    
    OPEN cur_cases;
    LOOP
        FETCH cur_cases INTO
            day,
            confirmed,
            deaths,
            recovered;
        EXIT WHEN cur_cases%notfound;
        casesinaday := cases_obj_type(confirmed, deaths, recovered, day, name);
        result.extend;
        result(i) := casesinaday;
        i := i+1;
        
    END LOOP;

    RETURN result;
END;

/
