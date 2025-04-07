CREATE TABLE Website_Visits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    visitor_ip VARCHAR(50),
    page_visited VARCHAR(255),
    visit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_agent TEXT
);
INSERT INTO Website_Visits (visitor_ip, page_visited, user_agent)
VALUES ('192.168.1.1', '/home', 'Mozilla/5.0');
SELECT page_visited, COUNT(*) AS visit_count 
FROM Website_Visits 
GROUP BY page_visited 
ORDER BY visit_count DESC;
SELECT COUNT(DISTINCT visitor_ip) FROM Website_Visits;
SELECT * FROM Links;
SELECT * FROM Links WHERE title = 'My travel.com';
