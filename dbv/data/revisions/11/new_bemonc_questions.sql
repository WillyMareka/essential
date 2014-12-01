USE `mnh_live`;
DROP procedure IF EXISTS `get_bemonc_question`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_bemonc_question`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45),statistic VARCHAR(45))
BEGIN
CASE statistic
WHEN 'response' THEN
CASE criteria
WHEN 'national' THEN
SELECT
    sf.sf_code,bem_conducted as response,
     sf.sf_name,
    COUNT(DISTINCT f.fac_mfl) AS total
FROM
    bemonc_functions bfs
        JOIN
    signal_functions sf ON sf.sf_code = bfs.sf_code
        JOIN
            facilities f ON f.fac_mfl = bfs.fac_mfl
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
GROUP BY sf.sf_code,bem_conducted
ORDER BY sf.sf_code;


WHEN 'facility' THEN
SELECT
    sf.sf_code,bem_conducted as response,
     sf.sf_name,
    COUNT(DISTINCT f.fac_mfl) AS total
FROM
    bemonc_functions bfs
        JOIN
    signal_functions sf ON sf.sf_code = bfs.sf_code
        JOIN
            facilities f ON f.fac_mfl = bfs.fac_mfl
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                WHERE f.fac_mfl = analytic_value
GROUP BY sf.sf_code,bem_conducted
ORDER BY sf.sf_code;

WHEN 'district' THEN
SELECT
    sf.sf_code,bem_conducted as response,
     sf.sf_name,
    COUNT(DISTINCT f.fac_mfl) AS total
FROM
    bemonc_functions bfs
        JOIN
    signal_functions sf ON sf.sf_code = bfs.sf_code
        JOIN
            facilities f ON f.fac_mfl = bfs.fac_mfl
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                WHERE f.fac_district = analytic_value
GROUP BY sf.sf_code,bem_conducted
ORDER BY sf.sf_code;

WHEN 'county' THEN
SELECT
    sf.sf_code,bem_conducted as response,
     sf.sf_name,
    COUNT(DISTINCT f.fac_mfl) AS total
FROM
    bemonc_functions bfs
        JOIN
    signal_functions sf ON sf.sf_code = bfs.sf_code
        JOIN
            facilities f ON f.fac_mfl = bfs.fac_mfl
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                WHERE f.fac_county = analytic_value
GROUP BY sf.sf_code,bem_conducted
ORDER BY sf.sf_code;

END CASE;

WHEN 'response_raw' THEN
CASE criteria

WHEN 'national' THEN
SELECT 
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name as signal_name,
    bf.bem_conducted as conducted
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY fac_county , fac_district , fac_name;
WHEN 'county' THEN
SELECT 
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name as signal_name,
    bf.bem_conducted as conducted
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY fac_county , fac_district , fac_name;
WHEN 'district' THEN
SELECT 
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name as signal_name,
    bf.bem_conducted as conducted
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY fac_county , fac_district , fac_name;
WHEN 'facility' THEN
SELECT 
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name as signal_name,
    bf.bem_conducted as conducted
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY fac_county , fac_district , fac_name;
END CASE;
END CASE;
END$$

DELIMITER ;

