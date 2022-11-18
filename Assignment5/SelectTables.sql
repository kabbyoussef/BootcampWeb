--a.1
select count(*) from actors 
union allBritish 
select count(*) from directors 
union all 
select count(*) from movies 
union all 
select count(*) from movie_revenues 
union all 
select count(*) from movies_actors 


--b.1
select movie_name,release_date from movies
--b.2 
select first_name,last_name from directors where nationality='American'
--b.3 
select * from actors where gender='M' AND date_of_birth>'1970-01-01'
--b.4 
select movie_name from movies  where movie_length>90 and movie_lang='English'

--c.1 
select movie_name,movie_lang from movies  where movie_lang in('English','Spanish','Korean')
--c.2 
select * from actors 
where first_name LIKE 'M%' 
and date_of_birth between '1940-01-01' and '1969-12-31'

--c.3 
select first_name,last_name from directors
where nationality in('British','French','German')
and date_of_birth between '1950-01-01' and '1980-12-31'