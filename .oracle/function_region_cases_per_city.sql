--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function REGION_CASES_PER_CITY
--------------------------------------------------------

  CREATE OR REPLACE NONEDITIONABLE FUNCTION "SYSTEM"."REGION_CASES_PER_CITY" (
    p_region IN NUMBER
) RETURN total_cases_tbl_type AS

    result      total_cases_tbl_type := total_cases_tbl_type();
    confirmed   NUMBER(6);
    deaths      NUMBER(6);
    recovered   NUMBER(6);
    day         DATE;
    name        VARCHAR2(40);
    i           NUMBER(2) := 1;
    cases       cases_obj_type;
    CURSOR cur_ville IS
    SELECT
        SUM(confirmed),
        SUM(deaths),
        SUM(recovered),
        MAX(day),
        name
    FROM
        cases,
        villes
    WHERE
        cases.ville_id = villes.id
        AND cases.region_id = p_region
    GROUP BY
        name;

BEGIN
    OPEN cur_ville;
    LOOP
        FETCH cur_ville INTO
            confirmed,
            deaths,
            recovered,
            day,
            name;
        EXIT WHEN cur_ville%notfound;
            -- dbms_output.put_line('city: ' || NAME || ' RECOVERED cases: ' || RECOVERED|| ' CONFIRMED cases: ' || CONFIRMED|| ' deaths cases: ' || DEATHS);
        cases := cases_obj_type(confirmed, deaths, recovered, day, name);
        result.extend;
        result(i) := cases;
        i := i + 1;
    END LOOP;

    RETURN result;
END;

/
