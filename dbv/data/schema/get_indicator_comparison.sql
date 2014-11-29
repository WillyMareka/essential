-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_indicator_comparison`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45), indicator_for VARCHAR(45), statistic VARCHAR(45))
BEGIN
CASE statistic
WHEN 'correctness' THEN  

CASE criteria
WHEN 'national' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
        )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        where i.indicator_name != 'Correct Classification'
GROUP BY indicator_name , verdict;
WHEN 'county' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
       AND fac_county=analytic_value )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        where i.indicator_name != 'Correct Classification'
GROUP BY indicator_name , verdict;
WHEN 'district' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
       AND fac_district=analytic_value )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        where i.indicator_name != 'Correct Classification'
GROUP BY indicator_name , verdict;
WHEN 'facility' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
       AND fac_mfl=analytic_value )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        where i.indicator_name != 'Correct Classification'
GROUP BY indicator_name , verdict;
END CASE;

WHEN 'classification' THEN 
CASE criteria 
WHEN 'national' THEN  
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators li JOIN indicators i ON li.indicator_code = i.indicator_code
JOIN facilities f ON f.fac_mfl = li.fac_mfl
JOIN indicator_lookup il ON il.il_for = i.indicator_for
JOIN survey_status ss ON ss.fac_id = li.fac_mfl
JOIN survey_categories sc On ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
AND i.indicator_name = 'Correct Classification'

GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

WHEN 'county' THEN 
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators li JOIN indicators i ON li.indicator_code = i.indicator_code
JOIN facilities f ON f.fac_mfl = li.fac_mfl
JOIN indicator_lookup il ON il.il_for = i.indicator_for
JOIN survey_status ss ON ss.fac_id = li.fac_mfl
JOIN survey_categories sc On ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
AND i.indicator_name = 'Correct Classification'
AND f.fac_county = analytic_value
GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

WHEN 'district' THEN 
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators li JOIN indicators i ON li.indicator_code = i.indicator_code
JOIN facilities f ON f.fac_mfl = li.fac_mfl
JOIN indicator_lookup il ON il.il_for = i.indicator_for
JOIN survey_status ss ON ss.fac_id = li.fac_mfl
JOIN survey_categories sc On ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
AND i.indicator_name = 'Correct Classification'
AND f.fac_district = analytic_value
GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

WHEN 'facility' THEN  
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators li JOIN indicators i ON li.indicator_code = i.indicator_code
JOIN facilities f ON f.fac_mfl = li.fac_mfl
JOIN indicator_lookup il ON il.il_for = i.indicator_for
JOIN survey_status ss ON ss.fac_id = li.fac_mfl
JOIN survey_categories sc On ss.sc_id = sc.sc_id AND sc.sc_name = survey_category
JOIN survey_types st ON ss.st_id = st.st_id AND st.st_name = survey_type
WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
AND i.indicator_name = 'Correct Classification'
AND f.fac_mfl = analytic_value
GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

END CASE;

WHEN 'assessment' THEN  
CASE criteria
WHEN 'national' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    survey_types st ON ss.st_id = st.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
WHERE
    i.indicator_name != 'Correct Classification'
GROUP BY i.indicator_name , li_hcwResponse;

WHEN 'county' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    survey_types st ON ss.st_id = st.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_county = analytic_value
GROUP BY i.indicator_name , li_hcwResponse;

WHEN 'district' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    survey_types st ON ss.st_id = st.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_district = analytic_value
GROUP BY i.indicator_name , li_hcwResponse;

WHEN 'facility' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    survey_types st ON ss.st_id = st.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_mfl = analytic_value
GROUP BY i.indicator_name , li_hcwResponse;

END CASE;

WHEN 'hcwcorrectness_raw' THEN 
CASE criteria
WHEN 'national' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
        AND f.fac_county = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
        AND f.fac_district = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
        AND f.fac_mfl = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;
END CASE;

WHEN 'hcwcorrectness' THEN 
CASE criteria
WHEN 'national' THEN 
SELECT 
    count(CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
GROUP BY indicator_name , verdict;

WHEN 'county' THEN 
SELECT 
    count(CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
        AND f.fac_county = analytic_value
GROUP BY indicator_name , verdict;

WHEN 'district' THEN 
SELECT 
    count(CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
        AND f.fac_district = analytic_value
GROUP BY indicator_name , verdict;

WHEN 'facility' THEN 
SELECT 
    count(CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl)
        where i.indicator_name != 'Correct Classification'
        AND f.fac_mfl = analytic_value
GROUP BY indicator_name , verdict;
END CASE;

WHEN 'hcwclassification_raw' THEN 
CASE criteria
WHEN 'national' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    i.indicator_name
FROM log_indicators_hcw li 
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'

GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN 
SELECT 
f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    i.indicator_name
FROM log_indicators_hcw li
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'
        AND f.fac_county = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN 
SELECT 
f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    i.indicator_name
FROM log_indicators_hcw li
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'
        AND f.fac_district = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN 
SELECT 
f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_assessorResponse,
    i.indicator_name
FROM log_indicators_hcw li
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'
        AND f.fac_mfl = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;
END CASE;

WHEN 'hcwclassification' THEN 
CASE criteria
WHEN 'national' THEN 
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators_hcw li 
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'

GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

WHEN 'county' THEN 
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators_hcw li 
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'
        AND f.fac_county = analytic_value
GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

WHEN 'district' THEN 
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators_hcw li 
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'
        AND f.fac_district = analytic_value
GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);

WHEN 'facility' THEN 
SELECT 
count(distinct f.fac_mfl) as total,
li.li_assessorResponse,i.indicator_name, i.indicator_for, il.il_full_name
FROM log_indicators_hcw li 
   JOIN indicators i ON li.indicator_code = i.indicator_code
    JOIN facilities f ON f.fac_mfl = li.fac_mfl
      JOIN indicator_lookup il ON il.il_for = i.indicator_for
     
   WHERE il.il_for != 'svd' && il.il_for != 'fed' && il.il_for != 'wgt' && il.il_for != 'jau'
    AND i.indicator_name = 'Correct Classification'
        AND f.fac_mfl = analytic_value
GROUP BY li.li_assessorResponse,i.indicator_name, i.indicator_for
ORDER BY count(distinct f.fac_mfl);
END CASE;

WHEN 'hcwassessment' THEN  
CASE criteria
WHEN 'national' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        
WHERE
    i.indicator_name != 'Correct Classification'
GROUP BY i.indicator_name , li_hcwResponse;

WHEN 'county' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
       
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_county = analytic_value
GROUP BY i.indicator_name , li_hcwResponse;

WHEN 'district' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
       
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_district = analytic_value
GROUP BY i.indicator_name , li_hcwResponse;

WHEN 'facility' THEN 
SELECT 
    COUNT(DISTINCT f.fac_mfl) AS total,
    li_hcwResponse,
    i.indicator_name,
    i.indicator_code,
    (CASE
        WHEN li.li_hcwResponse != 'N/A' THEN 'assessment done'
        ELSE 'assessment not done'
    END) AS response
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
       
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_mfl = analytic_value
GROUP BY i.indicator_name , li_hcwResponse;

END CASE;

WHEN 'hcwassessment_raw' THEN  
CASE criteria
WHEN 'national' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        
WHERE
    i.indicator_name != 'Correct Classification'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN 
SELECT 
   f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
       
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_county = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
       
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_district = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN 
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    li.li_hcwResponse,
    i.indicator_name
FROM
    log_indicators_hcw li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
       
WHERE
    i.indicator_name != 'Correct Classification'
    AND f.fac_mfl = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

END CASE;

END CASE;
END