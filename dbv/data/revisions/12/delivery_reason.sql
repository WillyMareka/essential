USE `mnh_live`;
DROP procedure IF EXISTS `get_delivery_reasons`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_delivery_reasons`(criteria VARCHAR(45), analytic_value VARCHAR(45),survey_type VARCHAR(45),survey_category VARCHAR(45) , statistic VARCHAR(45))
BEGIN

CASE statistic 
WHEN 'reason_raw' THEN 
CASE criteria

WHEN 'national' THEN
SELECT 
f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_reason AS Reason, 
lq.question_code AS Question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;


WHEN 'facility' THEN
SELECT 
   f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_reason AS Reason, 
lq.question_code AS Question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200'
AND fac_mfl = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;


WHEN 'district' THEN
SELECT 
   f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_reason  AS Reason, 
lq.question_code AS Question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200' 
AND fac_district = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN
SELECT 
   f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_reason AS Response, 
lq.question_code AS Question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200' 
AND fac_county = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

END CASE;
WHEN 'reason' THEN 
CASE criteria

WHEN 'national' THEN
SELECT 
   COUNT(distinct f.fac_mfl) as total_response,lq.lq_reason, lq.question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200'
GROUP BY lq.lq_reason;


WHEN 'facility' THEN
SELECT 
   COUNT(distinct f.fac_mfl) as total_response,lq.lq_reason, lq.question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200'
AND fac_mfl = analytic_value
GROUP BY lq.lq_reason; 


WHEN 'district' THEN
SELECT 
   COUNT(distinct f.fac_mfl) as total_response,lq.lq_reason, lq.question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200' 
AND fac_district = analytic_value
GROUP BY lq.lq_reason;

WHEN 'county' THEN
SELECT 
   COUNT(distinct f.fac_mfl) as total_response,lq.lq_reason, lq.question_code
FROM
    log_questions lq
JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
WHERE
    lq.question_code = 'QMNH200' 
AND fac_county = analytic_value
GROUP BY lq.lq_reason;
END CASE;

WHEN 'response' THEN
CASE criteria 
WHEN 'national' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total_response,
    lq.lq_response AS response,
    lq.question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
GROUP BY lq.lq_response , lq.question_code;

WHEN 'county' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total_response,
    lq.lq_response AS response,
    lq.question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
    AND f.fac_county = analytic_value
GROUP BY lq.lq_response , lq.question_code;

WHEN 'district' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total_response,
    lq.lq_response AS response,
    lq.question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
    AND f.fac_district = analytic_value
GROUP BY lq.lq_response , lq.question_code;

WHEN 'facility' THEN  
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total_response,
    lq.lq_response AS response,
    lq.question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
    AND f.fac_mfl = analytic_value
GROUP BY lq.lq_response , lq.question_code;
END CASE;

WHEN 'response_raw' THEN
CASE criteria 
WHEN 'national' THEN 
SELECT 
    f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_response AS Response, 
lq.question_code AS Question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN 
SELECT 
     f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_response AS Response, 
lq.question_code AS Question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
    AND f.fac_county = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN 
SELECT 
      f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_response AS Response, 
lq.question_code AS Question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
    AND f.fac_district = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN  
SELECT 
      f.fac_county,
f.fac_district,
f.fac_name,
f.fac_tier,
f.fac_mfl ,
lq.lq_response AS Response, 
lq.question_code AS Question_code
FROM
    log_questions lq
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON ss.st_id = st.st_id
    
        AND st.st_name = survey_type
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
WHERE
    lq.question_code = 'QMNH200'
    AND f.fac_mfl = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;
END CASE;
END CASE;
END$$

DELIMITER ;

