--A.1
select nationality,count(*)as "Directors" from directors group by nationality
--A.2 
select sum(movie_length),age_certificate,movie_lang from movies group by age_certificate,movie_lang
--A.3 
select movie_lang , sum(movie_length)as "Some of Length" from movies group by movie_lang having sum(movie_length)>500
--B.1
select d.first_name,d.last_name,m.movie_name,m.release_date,d.nationality from directors d,movies m 
where m.director_id= d.director_id and d.nationality in ('Chinese','Korean','Japanese')
--B.2
select m.movie_name,m.release_date,r.international_takings from movies m,movie_revenues r where m.movie_id= r.movie_id 
--b.3 
select m.movie_name,r.domestic_takings,r.international_takings from movies m,movie_revenues r where m.movie_id= r.movie_id and (r.domestic_takings is null or r.international_takings is null)
--c.1
select a.first_name,a.last_name
 from actors a, directors d, movies_actors c, movies m
where a.actor_id= c.actor_id and c.movie_id=m.movie_id 
and m.director_id=d.director_id and d.first_name ='Wes'
and d.last_name='Anderson' group by a.first_name,a.last_name
--c.2

select d.first_name,d.last_name,sum(r.domestic_takings) as Highest
from movies m, directors d,movie_revenues r
where m.director_id=d.director_id and m.movie_id=r.movie_id AND r.domestic_takings IS NOT NULL
group by d.first_name,d.last_name
ORDER BY HIGHEST DESC
LIMIT 1

