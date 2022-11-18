


CREATE TABLE  actors(
actor_id SERIAL PRIMARY KEY,	
first_name VARCHAR(30),
last_name VARCHAR(30),
gender CHAR(1),
date_of_birth DATE
);
CREATE TABLE  directors(
director_id SERIAL PRIMARY KEY,	

first_name VARCHAR(30),
last_name VARCHAR(30),
date_of_birth DATE,
nationality VARCHAR(30)
);
CREATE TABLE  movies(
movie_id SERIAL PRIMARY KEY,	
movie_name VARCHAR(50),
movie_lenghth int,
movie_lang VARCHAR(20),
release_date DATE,
age_certificate VARCHAR(5),
director_id int
);
CREATE TABLE  movie_revenues(
revenue_id SERIAL PRIMARY KEY,
movie_id int,
domestic_takings decimal(6,2),
internationl_takings decimal(6,2),
CONSTRAINT fk_movie_revenues FOREIGN KEY(movie_id)
REFERENCES movies(movie_id)
);

CREATE TABLE movies_actors(
movie_id INT,
actor_id INT,
CONSTRAINT fk_actors FOREIGN KEY(actor_id)
REFERENCES actors(actor_id),
CONSTRAINT fk_movie FOREIGN KEY(movie_id)
REFERENCES movies(movie_id)
);



