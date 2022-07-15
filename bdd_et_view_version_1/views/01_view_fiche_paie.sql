CREATE OR REPLACE VIEW paie_v_type_designation AS
SELECT td.id AS id_type,td.type_designation, ds.id AS id_designation, ds.code,ds.designation
FROM paie_type_designations td JOIN paie_designations ds ON td.id = ds.id_type_designations;