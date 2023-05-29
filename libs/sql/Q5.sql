SELECT d.last_name,d.val, d.generation, d.members
        FROM (
        
        SELECT b.last_name, b.postcode, SUM(b.val) AS val,
        CASE 
        WHEN 
            b.dob >2013
            THEN 
            1
        WHEN 
            b.dob >1997
            THEN 
            2
        WHEN 
            b.dob >1981
            THEN 
            3
        WHEN 
            b.dob >1965
            THEN 
            4
        WHEN 
            b.dob >1955
            THEN 
            5
        WHEN 
            b.dob >1946
            THEN 
            6
        WHEN 
            b.dob >1928
            THEN 
            7
        WHEN 
            b.dob >1922
            THEN 
            8
        END AS generation, COUNT(b.last_name) AS members
        FROM (
        SELECT c.reference, c.last_name, YEAR(c.dob) AS dob,c.postcode, SUM(i.value) AS val
        FROM clients AS c INNER JOIN incomedata AS i
        ON c.reference = i.reference
        GROUP BY c.reference ) AS b
        GROUP BY last_name, generation
        ORDER BY COUNT(b.last_name) DESC ) AS d 
        WHERE d.members = (SELECT MAX(d.members)
        FROM (
        
        SELECT b.last_name, b.postcode, SUM(b.val) AS val,
        CASE 
        WHEN 
            b.dob >2013
            THEN 
            1
        WHEN 
            b.dob >1997
            THEN 
            2
        WHEN 
            b.dob >1981
            THEN 
            3
        WHEN 
            b.dob >1965
            THEN 
            4
        WHEN 
            b.dob >1955
            THEN 
            5
        WHEN 
            b.dob >1946
            THEN 
            6
        WHEN 
            b.dob >1928
            THEN 
            7
        WHEN 
            b.dob >1922
            THEN 
            8
        END AS generation, COUNT(b.last_name) AS members
        FROM (
        SELECT c.reference, c.last_name, YEAR(c.dob) AS dob,c.postcode, SUM(i.value) AS val
        FROM clients AS c INNER JOIN incomedata AS i
        ON c.reference = i.reference
        GROUP BY c.reference ) AS b
        GROUP BY last_name, generation
        ORDER BY COUNT(b.last_name) DESC ) AS d )
