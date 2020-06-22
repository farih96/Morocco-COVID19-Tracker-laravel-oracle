--------------------------------------------------------
--  File created - Monday-June-22-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Procedure UPDATECASE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE NONEDITIONABLE PROCEDURE "SYSTEM"."UPDATECASE" (
    cases_id          IN   NUMBER,
    new_confirmed   IN   NUMBER,
    new_recovered   IN   NUMBER,
    new_deaths      IN   NUMBER
) IS
BEGIN
    UPDATE cases
    SET
        confirmed = new_confirmed,
        recovered = new_recovered,
        deaths = new_deaths
    WHERE
        id = cases_id ; 
END;

/
