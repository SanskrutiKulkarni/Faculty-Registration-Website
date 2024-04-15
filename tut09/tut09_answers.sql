-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 
-- 1. List the names of all left-handed batsmen from England. Order the results alphabetically.

SELECT player_name
FROM players
WHERE batting_hand = 'Left-hand' AND country_name = 'England'
ORDER BY player_name;


-- 2. List the names and age (in years) as on 2018-12-02 of all bowlers with skill “Legbreak googly” who are 28 or more in age. Order the result in decreasing order of their ages.

SELECT player_name, YEAR(CURRENT_DATE) - YEAR(dob) - (RIGHT(CURRENT_DATE, 5) < RIGHT(dob, 5)) AS player_age
FROM players
WHERE bowling_skill = 'Legbreak googly' AND dob <= '1990-12-02'
ORDER BY player_age DESC, player_name;


-- 3. List the match ids and toss winning team IDs where the toss winner of a match decided to bat first. Order result in increasing order of match ids.

SELECT match_id, toss_winner
FROM matches
WHERE toss_decision = 'bat'
ORDER BY match_id;


-- 4. In the match with match id 335987, list the over ids and runs scored where at most 7 runs were scored. Order the over ids in decreasing order of runs scored. Resolve ties by listing the over ids in increasing order.

SELECT over_id, SUM(runs_scored) AS runs_scored
FROM ball_by_ball
WHERE match_id = 335987
GROUP BY over_id
HAVING runs_scored <= 7
ORDER BY runs_scored DESC, over_id;


-- 5. List the names of those batsmen who were bowled at least once in alphabetical order of their names.

SELECT DISTINCT p.player_name
FROM players p
INNER JOIN ball_by_ball b ON p.player_id = b.striker
INNER JOIN player_out o ON b.match_id = o.match_id AND b.over_id = o.over_id AND b.ball_id = o.ball_id AND b.innings_no = o.innings_no
WHERE o.kind_out = 'bowled'
ORDER BY p.player_name;


-- 6. List all the match ids along with the names of teams participating (team 1, team 2), name of the winning team, and win margin where the win margin is at least 60 runs, in increasing order of win margin. Resolve ties by listing the match ids in increasing order.

SELECT m.match_id, t1.name AS team_1, t2.name AS team_2, 
    CASE
        WHEN m.team_1 = m.match_winner THEN t1.name
        ELSE t2.name
    END AS winning_team_name,
    ABS(win_margin) AS win_margin
FROM matches m
INNER JOIN teams t1 ON m.team_1 = t1.team_id
INNER JOIN teams t2 ON m.team_2 = t2.team_id
WHERE ABS(win_margin) >= 60
ORDER BY ABS(win_margin), m.match_id;


-- 7. List the names of all left-handed batsmen below 30 years of age as on 2018-12-02 alphabetically.

SELECT player_name
FROM players
WHERE batting_hand = 'Left-hand' AND dob > '1988-12-02'
ORDER BY player_name;


-- 8. List the match wise total for the entire series. The output should be match id, total runs. Return the results in increasing order of match ids.

SELECT match_id, SUM(runs_scored) AS total_runs
FROM ball_by_ball
GROUP BY match_id
ORDER BY match_id;


-- 9. For each match id, list the maximum runs scored in any over and the bowler bowling in that over. If there is more than one over having maximum runs, return all of them and order them in increasing order of over id. Order results in increasing order of match ids.

SELECT b.match_id, MAX(b.runs_scored) AS maximum_runs, p.player_name
FROM ball_by_ball b
JOIN (SELECT match_id, over_id, MAX(runs_scored) AS max_runs
      FROM ball_by_ball
      GROUP BY match_id, over_id) AS max_runs_per_over
ON b.match_id = max_runs_per_over.match_id AND b.over_id = max_runs_per_over.over_id AND b.runs_scored = max_runs_per_over.max_runs
JOIN players p ON b.bowler = p.player_id
GROUP BY b.match_id, b.over_id, p.player_name
ORDER BY b.match_id, b.over_id;


-- 10. List the names of batsmen and the number of times they have been “run out” in decreasing order of being “run out”. Resolve ties alphabetically.

SELECT p.player_name, COUNT(*) AS number
FROM players p
JOIN player_out po ON p.player_id = po.player_out
WHERE po.kind_out = 'run out'
GROUP BY p.player_name
ORDER BY number DESC, p.player_name;
