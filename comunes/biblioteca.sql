DROP TABLE IF EXISTS lectores CASCADE;

CREATE TABLE lectores (
    id          bigserial       PRIMARY KEY NOT NULL UNIQUE,
    nombre      varchar(255)    NOT NULL,
    telefono    numeric(9)      NOT NULL
);

DROP TABLE IF EXISTS libros CASCADE;

CREATE TABLE libros (
    id      bigserial       PRIMARY KEY NOT NULL UNIQUE,
    isbn    varchar(255)    NOT NULL UNIQUE,
    titulo  varchar(255)    NOT NULL
);

DROP TABLE IF EXISTS prestamos CASCADE;

CREATE TABLE prestamos (
    id              bigserial       PRIMARY KEY NOT NULL UNIQUE,
    libro_id        bigserial       NOT NULL UNIQUE,
    lector_id       bigserial       NOT NULL,
    creado_en       numeric(4),
    devuelto_en     numeric(4),
    foreign key(lector_id) references lectores(id),
    foreign key(libro_id)  references libros(id)            
);

INSERT INTO lectores (nombre, telefono)
            VALUES ('antonio', '123456783'),
                    ('celeste', '722472887'),
                    ('maria', '123456789'),
                    ('josemari', '123456789');

INSERT INTO libros (isbn, titulo)
            VALUES ('1', 'libro1'),
                    ('2', 'libro2'),
                    ('3', 'libro3'),
                    ('4', 'libro4'),
                    ('6', 'libro6'),
                    ('7', 'libro7'),
                    ('8', 'libro8'),
                    ('9', 'libro9'),
                    ('10', 'libro10'),
                    ('11', 'libro11'),
                    ('12', 'libro12');


