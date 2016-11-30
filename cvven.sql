--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.4
-- Dumped by pg_dump version 9.5.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE utilisateur (
    idclient integer NOT NULL,
    nomclient character varying(25),
    prenomclient character varying(25),
    adresseclient character varying(100),
    codepostal integer,
    telclient integer,
    loginclient character varying(25),
    mdpclient character varying(25),
    admin smallint DEFAULT 0
);


ALTER TABLE utilisateur OWNER TO postgres;

--
-- Name: client_idclient_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE client_idclient_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE client_idclient_seq OWNER TO postgres;

--
-- Name: client_idclient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE client_idclient_seq OWNED BY utilisateur.idclient;


--
-- Name: hebergement; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE hebergement (
    idheb integer NOT NULL,
    typeheb character varying(25),
    descriptionheb character varying(2000)
);


ALTER TABLE hebergement OWNER TO postgres;

--
-- Name: hebergement_idheb_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hebergement_idheb_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE hebergement_idheb_seq OWNER TO postgres;

--
-- Name: hebergement_idheb_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hebergement_idheb_seq OWNED BY hebergement.idheb;


--
-- Name: sejour; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE sejour (
    idsejour integer NOT NULL,
    tarifsejour double precision,
    nbpersonnes integer,
    datedebut date,
    datefin date,
    menage boolean,
    idclient integer,
    idheb integer,
    "etatReserv" boolean DEFAULT false NOT NULL,
    idlieu integer
);


ALTER TABLE sejour OWNER TO postgres;

--
-- Name: sejour_idsejour_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sejour_idsejour_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sejour_idsejour_seq OWNER TO postgres;

--
-- Name: sejour_idsejour_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE sejour_idsejour_seq OWNED BY sejour.idsejour;


--
-- Name: ville; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ville (
    idville integer NOT NULL,
    nom character varying(25),
    region character varying(25),
    pays character varying
);


ALTER TABLE ville OWNER TO postgres;

--
-- Name: ville_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ville_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ville_id_seq OWNER TO postgres;

--
-- Name: ville_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ville_id_seq OWNED BY ville.idville;


--
-- Name: idheb; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hebergement ALTER COLUMN idheb SET DEFAULT nextval('hebergement_idheb_seq'::regclass);


--
-- Name: idsejour; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sejour ALTER COLUMN idsejour SET DEFAULT nextval('sejour_idsejour_seq'::regclass);


--
-- Name: idclient; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY utilisateur ALTER COLUMN idclient SET DEFAULT nextval('client_idclient_seq'::regclass);


--
-- Name: idville; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ville ALTER COLUMN idville SET DEFAULT nextval('ville_id_seq'::regclass);


--
-- Name: client_idclient_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('client_idclient_seq', 20, true);


--
-- Data for Name: hebergement; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY hebergement (idheb, typeheb, descriptionheb) FROM stdin;
1	Logement	Entrée, douche et wc, 2 chambres à 2 lits avec coin toilette et balcon.
2	Chambre double	Entrée, douche et wc, 1 lit double.
3	Chambre de 3 lits	3 lits séparés par une cloison mobile avec coin toilette, wc, douche.
4	Chambre de 4 lits	4 lits séparés par une cloison mobile avec douche, wc et balcon.
5	Logement H	Logement adapté pour les personnes à mobilité réduite.
\.


--
-- Name: hebergement_idheb_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hebergement_idheb_seq', 42, true);


--
-- Data for Name: sejour; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sejour (idsejour, tarifsejour, nbpersonnes, datedebut, datefin, menage, idclient, idheb, "etatReserv", idlieu) FROM stdin;
75	\N	12	2017-11-11	2019-05-28	t	3	1	f	4
\.


--
-- Name: sejour_idsejour_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sejour_idsejour_seq', 75, true);


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY utilisateur (idclient, nomclient, prenomclient, adresseclient, codepostal, telclient, loginclient, mdpclient, admin) FROM stdin;
1	homaitre	killian	domaine 	77100	683450103	killian	killian	0
2	Dormoy	Guillaume	crous	77777	777777777	patate	test	1
3	becher	alex	descartes	77777	888888888	alex	alex	0
4	cassim	sylvie	descartes	77777	999999999	sylvie	sylvie	0
5	lucian	hoshina	5 rue des pommes	91840	164567891	lucian	lucian	0
6	skaward	lucie	10 rue des pommes	77420	165789870	lucie	lucie	0
10	Kenobi	Obiwan	8 rue bazd	77878	164336544	obi	test	0
12	skaward	lucie	10 rue des pommes	77420	165789870	lucia	lucia	0
13	masanaga	hoshina	9 rue des zinzin	77420	165789870	masa	masa	0
14	abiwan	kenobi	les merisiers	77450	102030405	obibi	obibi	0
16	maxime	agneray	champs	77458	102030405	max	max	0
17	Rieux	André	oiqzoqioi	145478	102030405	dede	dede	0
18	Amidala	Padme	les merisiers	1456	102030405	padama	padama	0
19	dBechet	alexandre	25 allée de l'étoile noire	77456	102030405	alala	alala	0
20	killian	homaitre	8 B rue de la lampe 	77100	102030405	kil	kil	0
\.


--
-- Data for Name: ville; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ville (idville, nom, region, pays) FROM stdin;
1	Les Rousses	Jura	France
2	La Rochelle	Charente-Maritime	France
3	Saint-Anthème	Puy-de-Dôme	France
4	Villefort	Lozère	France
\.


--
-- Name: ville_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ville_id_seq', 4, true);


--
-- Name: login_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY utilisateur
    ADD CONSTRAINT login_unique UNIQUE (loginclient);


--
-- Name: prk_constraint_client; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY utilisateur
    ADD CONSTRAINT prk_constraint_client PRIMARY KEY (idclient);


--
-- Name: prk_constraint_hebergement; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hebergement
    ADD CONSTRAINT prk_constraint_hebergement PRIMARY KEY (idheb);


--
-- Name: prk_constraint_sejour; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sejour
    ADD CONSTRAINT prk_constraint_sejour PRIMARY KEY (idsejour);


--
-- Name: ville_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ville
    ADD CONSTRAINT ville_pkey PRIMARY KEY (idville);


--
-- Name: fk_sejour_idclient; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sejour
    ADD CONSTRAINT fk_sejour_idclient FOREIGN KEY (idclient) REFERENCES utilisateur(idclient);


--
-- Name: fk_sejour_idheb; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sejour
    ADD CONSTRAINT fk_sejour_idheb FOREIGN KEY (idheb) REFERENCES hebergement(idheb);


--
-- Name: idlieu; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sejour
    ADD CONSTRAINT idlieu FOREIGN KEY (idlieu) REFERENCES ville(idville);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
GRANT ALL ON SCHEMA public TO alex WITH GRANT OPTION;
GRANT ALL ON SCHEMA public TO killian WITH GRANT OPTION;
GRANT ALL ON SCHEMA public TO sylvie WITH GRANT OPTION;


--
-- Name: utilisateur; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE utilisateur FROM PUBLIC;
GRANT ALL ON TABLE utilisateur TO alex WITH GRANT OPTION;
GRANT ALL ON TABLE utilisateur TO killian WITH GRANT OPTION;
GRANT ALL ON TABLE utilisateur TO sylvie WITH GRANT OPTION;


--
-- Name: client_idclient_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE client_idclient_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE client_idclient_seq FROM postgres;
GRANT ALL ON SEQUENCE client_idclient_seq TO postgres;
GRANT ALL ON SEQUENCE client_idclient_seq TO alex;


--
-- Name: hebergement; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE hebergement FROM PUBLIC;
REVOKE ALL ON TABLE hebergement FROM postgres;
GRANT ALL ON TABLE hebergement TO postgres;
GRANT ALL ON TABLE hebergement TO sylvie;
GRANT SELECT,INSERT,DELETE ON TABLE hebergement TO killian;
GRANT ALL ON TABLE hebergement TO alex;


--
-- Name: hebergement_idheb_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE hebergement_idheb_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE hebergement_idheb_seq FROM postgres;
GRANT ALL ON SEQUENCE hebergement_idheb_seq TO postgres;
GRANT ALL ON SEQUENCE hebergement_idheb_seq TO alex;


--
-- Name: sejour; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE sejour FROM PUBLIC;
REVOKE ALL ON TABLE sejour FROM postgres;
GRANT ALL ON TABLE sejour TO postgres;
GRANT ALL ON TABLE sejour TO sylvie;
GRANT ALL ON TABLE sejour TO alex;
GRANT SELECT,INSERT,DELETE ON TABLE sejour TO killian;


--
-- Name: sejour_idsejour_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE sejour_idsejour_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE sejour_idsejour_seq FROM postgres;
GRANT ALL ON SEQUENCE sejour_idsejour_seq TO postgres;
GRANT ALL ON SEQUENCE sejour_idsejour_seq TO alex;


--
-- PostgreSQL database dump complete
--

