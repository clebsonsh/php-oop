CREATE TABLE states (
  id integer PRIMARY KEY NOT NULL,
  abbreviation char(2),
  name text
);

CREATE TABLE cities (
  id integer PRIMARY KEY NOT NULL,
  name text,
  state_id INTEGER REFERENCES states (id)
);

CREATE TABLE people (
  id integer PRIMARY KEY NOT NULL,
  name text,
  address text,
  neighborhood text,
  phone text,
  email text,
  city_id integer references cites (id)
);

INSERT INTO
  states
VALUES
  (1, 'AC', 'Acre');

INSERT INTO
  cities
VALUES
  (1, 'Rio Branco', 1);
