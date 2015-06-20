--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.2
-- Dumped by pg_dump version 9.4.2
-- Started on 2015-06-20 19:38:11

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 187 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2064 (class 0 OID 0)
-- Dependencies: 187
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 179 (class 1259 OID 24627)
-- Name: alunoturma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE alunoturma (
    codigo bigint NOT NULL,
    codigo_aluno bigint,
    codigo_turma bigint
);


ALTER TABLE alunoturma OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 24625)
-- Name: alunoturma_codigo; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE alunoturma_codigo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE alunoturma_codigo OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 24680)
-- Name: alunoturma_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE alunoturma_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE alunoturma_codigo_seq OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 24601)
-- Name: disciplina; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE disciplina (
    codigo bigint NOT NULL,
    nome character varying(255) NOT NULL
);


ALTER TABLE disciplina OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 24599)
-- Name: disciplina_codigo; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disciplina_codigo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE disciplina_codigo OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 24682)
-- Name: disciplina_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disciplina_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE disciplina_codigo_seq OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 24645)
-- Name: frequencia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE frequencia (
    codigo bigint NOT NULL,
    codigo_aluno bigint,
    aula bigint,
    presenca character varying(1),
    codigo_turma bigint
);


ALTER TABLE frequencia OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 24643)
-- Name: frequencia_codigo; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE frequencia_codigo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE frequencia_codigo OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 24684)
-- Name: frequencia_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE frequencia_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE frequencia_codigo_seq OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 24590)
-- Name: pessoa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pessoa (
    codigo bigint NOT NULL,
    nome character varying(255) NOT NULL,
    ddd character varying(4),
    telefone character varying(20),
    endereco character varying(255),
    email character varying(128) NOT NULL,
    tipo character varying(1) NOT NULL,
    senha character varying(255) NOT NULL
);


ALTER TABLE pessoa OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 24588)
-- Name: pessoa_codigo; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pessoa_codigo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pessoa_codigo OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 24686)
-- Name: pessoa_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pessoa_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pessoa_codigo_seq OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 24609)
-- Name: turma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE turma (
    codigo bigint NOT NULL,
    codigo_disciplina bigint,
    codigo_professor bigint,
    datainicio timestamp without time zone,
    datafim timestamp without time zone,
    quantidadeaulas bigint
);


ALTER TABLE turma OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 24607)
-- Name: turma_codigo; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE turma_codigo
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE turma_codigo OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 24688)
-- Name: turma_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE turma_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE turma_codigo_seq OWNER TO postgres;

--
-- TOC entry 2049 (class 0 OID 24627)
-- Dependencies: 179
-- Data for Name: alunoturma; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY alunoturma (codigo, codigo_aluno, codigo_turma) FROM stdin;
65	16	11
66	17	11
67	1	11
69	16	14
\.


--
-- TOC entry 2065 (class 0 OID 0)
-- Dependencies: 178
-- Name: alunoturma_codigo; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('alunoturma_codigo', 1, false);


--
-- TOC entry 2066 (class 0 OID 0)
-- Dependencies: 182
-- Name: alunoturma_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('alunoturma_codigo_seq', 69, true);


--
-- TOC entry 2045 (class 0 OID 24601)
-- Dependencies: 175
-- Data for Name: disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY disciplina (codigo, nome) FROM stdin;
11	Persistência e Armazenamento de Dados
9	Empreendedorismo e Startups
4	Usabilidade e Design de Interfaces
\.


--
-- TOC entry 2067 (class 0 OID 0)
-- Dependencies: 174
-- Name: disciplina_codigo; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disciplina_codigo', 1, false);


--
-- TOC entry 2068 (class 0 OID 0)
-- Dependencies: 183
-- Name: disciplina_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disciplina_codigo_seq', 20, true);


--
-- TOC entry 2051 (class 0 OID 24645)
-- Dependencies: 181
-- Data for Name: frequencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY frequencia (codigo, codigo_aluno, aula, presenca, codigo_turma) FROM stdin;
78	16	1	J	14
79	16	2	P	14
80	16	3	J	14
81	16	4	P	14
82	16	5	P	14
83	16	6	J	14
51	16	1	P	11
52	16	2	P	11
53	16	3	P	11
54	17	1	P	11
55	17	2	F	11
56	17	3	J	11
57	1	1	J	11
58	1	2	F	11
59	1	3	P	11
\.


--
-- TOC entry 2069 (class 0 OID 0)
-- Dependencies: 180
-- Name: frequencia_codigo; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('frequencia_codigo', 1, false);


--
-- TOC entry 2070 (class 0 OID 0)
-- Dependencies: 184
-- Name: frequencia_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('frequencia_codigo_seq', 83, true);


--
-- TOC entry 2043 (class 0 OID 24590)
-- Dependencies: 173
-- Data for Name: pessoa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pessoa (codigo, nome, ddd, telefone, endereco, email, tipo, senha) FROM stdin;
1	Carlos Eduardo de Vargas	\N	\N	Rua Cel. Chicuta 444	cev@outlook.com	2	123456
9	Guilherme Elias	(54)	9999-9999	Rua Teste	teste@teste.com.br	1	123456
17	Aluno Teste	54	9999-9999	Rua Teste, 1000	aluno@teste.com.br	2	1111111
18	Professor  Teste	54	9999-9999	teste	professor@teste.com.br	1	111111
16	Aluno 3	54	9999-9999	Rua Teste, 1000	teste2@teste.com.br	2	111111
\.


--
-- TOC entry 2071 (class 0 OID 0)
-- Dependencies: 172
-- Name: pessoa_codigo; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pessoa_codigo', 1, false);


--
-- TOC entry 2072 (class 0 OID 0)
-- Dependencies: 185
-- Name: pessoa_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pessoa_codigo_seq', 19, true);


--
-- TOC entry 2047 (class 0 OID 24609)
-- Dependencies: 177
-- Data for Name: turma; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY turma (codigo, codigo_disciplina, codigo_professor, datainicio, datafim, quantidadeaulas) FROM stdin;
12	4	9	2015-06-10 00:00:00	2015-06-19 00:00:00	9
11	11	9	2015-06-12 00:00:00	2015-06-19 00:00:00	7
14	9	18	2015-06-04 00:00:00	2015-06-10 00:00:00	6
\.


--
-- TOC entry 2073 (class 0 OID 0)
-- Dependencies: 176
-- Name: turma_codigo; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('turma_codigo', 1, false);


--
-- TOC entry 2074 (class 0 OID 0)
-- Dependencies: 186
-- Name: turma_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('turma_codigo_seq', 18, true);


--
-- TOC entry 1923 (class 2606 OID 24632)
-- Name: pk_alunoturma; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY alunoturma
    ADD CONSTRAINT pk_alunoturma PRIMARY KEY (codigo);


--
-- TOC entry 1919 (class 2606 OID 24606)
-- Name: pk_disciplina; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY disciplina
    ADD CONSTRAINT pk_disciplina PRIMARY KEY (codigo);


--
-- TOC entry 1926 (class 2606 OID 24650)
-- Name: pk_frequencia; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY frequencia
    ADD CONSTRAINT pk_frequencia PRIMARY KEY (codigo);


--
-- TOC entry 1917 (class 2606 OID 24598)
-- Name: pk_pessoa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pk_pessoa PRIMARY KEY (codigo);


--
-- TOC entry 1921 (class 2606 OID 24614)
-- Name: pk_turma; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT pk_turma PRIMARY KEY (codigo);


--
-- TOC entry 1924 (class 1259 OID 24665)
-- Name: idx_26ed927478d148ab; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX idx_26ed927478d148ab ON frequencia USING btree (codigo_turma);


--
-- TOC entry 1932 (class 2606 OID 24660)
-- Name: fk_26ed927478d148ab; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY frequencia
    ADD CONSTRAINT fk_26ed927478d148ab FOREIGN KEY (codigo_turma) REFERENCES turma(codigo);


--
-- TOC entry 1929 (class 2606 OID 24633)
-- Name: fk_aluno_codigo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alunoturma
    ADD CONSTRAINT fk_aluno_codigo FOREIGN KEY (codigo_aluno) REFERENCES pessoa(codigo);


--
-- TOC entry 1927 (class 2606 OID 24615)
-- Name: fk_disciplina_codigo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT fk_disciplina_codigo FOREIGN KEY (codigo_disciplina) REFERENCES disciplina(codigo);


--
-- TOC entry 1931 (class 2606 OID 24651)
-- Name: fk_frequencia_aluno_codigo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY frequencia
    ADD CONSTRAINT fk_frequencia_aluno_codigo FOREIGN KEY (codigo_aluno) REFERENCES pessoa(codigo);


--
-- TOC entry 1928 (class 2606 OID 24620)
-- Name: fk_professor_codigo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT fk_professor_codigo FOREIGN KEY (codigo_professor) REFERENCES pessoa(codigo);


--
-- TOC entry 1930 (class 2606 OID 24638)
-- Name: fk_turma_codigo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alunoturma
    ADD CONSTRAINT fk_turma_codigo FOREIGN KEY (codigo_turma) REFERENCES turma(codigo);


--
-- TOC entry 2063 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-06-20 19:38:11

--
-- PostgreSQL database dump complete
--

