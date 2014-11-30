USE `mnh_live`;
DROP procedure IF EXISTS `get_bemonc_reason`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_bemonc_reason`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45),statistic VARCHAR(45))
BEGIN
CASE statistic
WHEN 'response' THEN

CASE criteria
WHEN 'national' THEN

SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_tier as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl 
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE challenge_code != 'Select One')
GROUP BY challenge_code,f.fac_tier
ORDER BY challenge_code;

WHEN 'county' THEN
SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_tier as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE f.fac_county = analytic_value AND  challenge_code != 'Select One')
GROUP BY challenge_code,f.fac_tier
ORDER BY challenge_code;

WHEN 'district' THEN
SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_tier as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl 
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
WHERE f.fac_district = analytic_value AND  challenge_code != 'Select One')
GROUP BY challenge_code,f.fac_tier
ORDER BY challenge_code;

WHEN 'facility' THEN
SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_tier as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl 
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
WHERE f.fac_mfl = analytic_value AND  challenge_code != 'Select One')
GROUP BY challenge_code,f.fac_tier
ORDER BY challenge_code;

END CASE;
WHEN 'response_raw' THEN
CASE criteria

WHEN 'national' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name AS signal_name,
    bf.challenge_code
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
ORDER BY f.fac_county , f.fac_district , f.fac_name;
WHEN 'county' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name AS signal_name,
    bf.challenge_code
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl AND f.fac_county = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name;

WHEN 'district' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name AS signal_name,
    bf.challenge_code
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_district = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name;

WHEN 'facility' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sf.sf_name AS signal_name,
    bf.challenge_code
FROM
    bemonc_functions bf
        JOIN
    signal_functions sf ON sf.sf_code = bf.sf_code
        JOIN
    facilities f ON bf.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_mfl = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name;

END CASE;
END CASE;
END$$

DELIMITER ;

