--
-- PostgreSQL database dump
--

-- Dumped from database version 10.6 (Ubuntu 10.6-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.6 (Ubuntu 10.6-0ubuntu0.18.04.1)

-- Started on 2019-04-26 17:43:08 -03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 13041)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3013 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 16728)
-- Name: cobrade; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.cobrade (
    codigo character(5) NOT NULL,
    grupo character varying(255) NOT NULL,
    subgrupo character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    subtipo character varying(255),
    ativo boolean NOT NULL
);


ALTER TABLE public.cobrade OWNER TO df_user;

--
-- TOC entry 198 (class 1259 OID 16738)
-- Name: dados_login; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.dados_login (
    id_usuario integer NOT NULL,
    email character varying(255) NOT NULL,
    senha character(60) NOT NULL
);


ALTER TABLE public.dados_login OWNER TO df_user;

--
-- TOC entry 197 (class 1259 OID 16736)
-- Name: dados_login_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.dados_login_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dados_login_id_usuario_seq OWNER TO df_user;

--
-- TOC entry 3014 (class 0 OID 0)
-- Dependencies: 197
-- Name: dados_login_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.dados_login_id_usuario_seq OWNED BY public.dados_login.id_usuario;


--
-- TOC entry 200 (class 1259 OID 16746)
-- Name: endereco_logradouro; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.endereco_logradouro (
    id_logradouro integer NOT NULL,
    logradouro character varying(255) NOT NULL,
    numero integer NOT NULL,
    referencia character varying(255)
);


ALTER TABLE public.endereco_logradouro OWNER TO df_user;

--
-- TOC entry 199 (class 1259 OID 16744)
-- Name: endereco_logradouro_id_logradouro_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.endereco_logradouro_id_logradouro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.endereco_logradouro_id_logradouro_seq OWNER TO df_user;

--
-- TOC entry 3015 (class 0 OID 0)
-- Dependencies: 199
-- Name: endereco_logradouro_id_logradouro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.endereco_logradouro_id_logradouro_seq OWNED BY public.endereco_logradouro.id_logradouro;


--
-- TOC entry 201 (class 1259 OID 16755)
-- Name: log_alteracao_ocorr; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_alteracao_ocorr (
    id_ocorrencia integer NOT NULL,
    id_usuario integer NOT NULL,
    data_hora timestamp without time zone NOT NULL
);


ALTER TABLE public.log_alteracao_ocorr OWNER TO df_user;

--
-- TOC entry 202 (class 1259 OID 16760)
-- Name: log_cadastro_usuario; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_cadastro_usuario (
    id_usuario_criador integer NOT NULL,
    id_usuario_novo integer NOT NULL,
    data_hora timestamp without time zone NOT NULL
);


ALTER TABLE public.log_cadastro_usuario OWNER TO df_user;

--
-- TOC entry 203 (class 1259 OID 16765)
-- Name: log_login; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_login (
    id_usuario integer NOT NULL,
    data_hora timestamp without time zone NOT NULL
);


ALTER TABLE public.log_login OWNER TO df_user;

--
-- TOC entry 205 (class 1259 OID 16772)
-- Name: ocorrencia; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.ocorrencia (
    id_ocorrencia integer NOT NULL,
    ocorr_endereco_principal character(10) NOT NULL,
    ocorr_coordenada_latitude real,
    ocorr_coordenada_longitude real,
    ocorr_logradouro_id integer,
    agente_principal integer NOT NULL,
    agente_apoio_1 integer,
    agente_apoio_2 integer,
    ocorr_retorno boolean NOT NULL,
    ocorr_referencia integer,
    data_lancamento date NOT NULL,
    data_ocorrencia date NOT NULL,
    ocorr_descricao character varying(100),
    ocorr_origem character varying(255),
    atendido_1 integer,
    atendido_2 integer,
    ocorr_cobrade character varying(5) NOT NULL,
    ocorr_natureza character varying(255),
    ocorr_fotos boolean NOT NULL,
    ocorr_prioridade character varying(10) NOT NULL,
    ocorr_analisado boolean NOT NULL,
    ocorr_congelado boolean NOT NULL,
    ocorr_encerrado boolean NOT NULL,
    CONSTRAINT check_prioridade CHECK ((((ocorr_prioridade)::text = 'Alta'::text) OR ((ocorr_prioridade)::text = 'Média'::text) OR ((ocorr_prioridade)::text = 'Baixa'::text)))
);


ALTER TABLE public.ocorrencia OWNER TO df_user;

--
-- TOC entry 204 (class 1259 OID 16770)
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.ocorrencia_id_ocorrencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ocorrencia_id_ocorrencia_seq OWNER TO df_user;

--
-- TOC entry 3016 (class 0 OID 0)
-- Dependencies: 204
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.ocorrencia_id_ocorrencia_seq OWNED BY public.ocorrencia.id_ocorrencia;


--
-- TOC entry 207 (class 1259 OID 16783)
-- Name: pessoa; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.pessoa (
    id_pessoa integer NOT NULL,
    nome character varying(255),
    cpf character(11),
    outros_documentos character varying(20),
    telefone character(11),
    email character varying(255)
);


ALTER TABLE public.pessoa OWNER TO df_user;

--
-- TOC entry 206 (class 1259 OID 16781)
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.pessoa_id_pessoa_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pessoa_id_pessoa_seq OWNER TO df_user;

--
-- TOC entry 3017 (class 0 OID 0)
-- Dependencies: 206
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.pessoa_id_pessoa_seq OWNED BY public.pessoa.id_pessoa;


--
-- TOC entry 208 (class 1259 OID 16792)
-- Name: usuario; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nome character varying(255) NOT NULL,
    cpf character(11) NOT NULL,
    telefone character(11),
    nivel_acesso character(1) NOT NULL,
    CONSTRAINT check_nivel_acesso CHECK (((nivel_acesso = '1'::bpchar) OR (nivel_acesso = '2'::bpchar) OR (nivel_acesso = '3'::bpchar)))
);


ALTER TABLE public.usuario OWNER TO df_user;

--
-- TOC entry 2828 (class 2604 OID 16741)
-- Name: dados_login id_usuario; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.dados_login ALTER COLUMN id_usuario SET DEFAULT nextval('public.dados_login_id_usuario_seq'::regclass);


--
-- TOC entry 2829 (class 2604 OID 16749)
-- Name: endereco_logradouro id_logradouro; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.endereco_logradouro ALTER COLUMN id_logradouro SET DEFAULT nextval('public.endereco_logradouro_id_logradouro_seq'::regclass);


--
-- TOC entry 2830 (class 2604 OID 16775)
-- Name: ocorrencia id_ocorrencia; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia ALTER COLUMN id_ocorrencia SET DEFAULT nextval('public.ocorrencia_id_ocorrencia_seq'::regclass);


--
-- TOC entry 2832 (class 2604 OID 16786)
-- Name: pessoa id_pessoa; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.pessoa ALTER COLUMN id_pessoa SET DEFAULT nextval('public.pessoa_id_pessoa_seq'::regclass);


--
-- TOC entry 2993 (class 0 OID 16728)
-- Dependencies: 196
-- Data for Name: cobrade; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.cobrade (codigo, grupo, subgrupo, tipo, subtipo, ativo) FROM stdin;
11110	Geológicos	Terremoto	Tremor de terra	\N	t
\.


--
-- TOC entry 2995 (class 0 OID 16738)
-- Dependencies: 198
-- Data for Name: dados_login; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.dados_login (id_usuario, email, senha) FROM stdin;
1	teste@gmail.com	$2a$08$KxwdFLldvH3wetW8i0b0JOFaYokaVAY6wP5cnw5AWuspbGv3los2C
\.


--
-- TOC entry 2997 (class 0 OID 16746)
-- Dependencies: 200
-- Data for Name: endereco_logradouro; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.endereco_logradouro (id_logradouro, logradouro, numero, referencia) FROM stdin;
1	Rua João Fernandes da Costa	796	\N
\.


--
-- TOC entry 2998 (class 0 OID 16755)
-- Dependencies: 201
-- Data for Name: log_alteracao_ocorr; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.log_alteracao_ocorr (id_ocorrencia, id_usuario, data_hora) FROM stdin;
\.


--
-- TOC entry 2999 (class 0 OID 16760)
-- Dependencies: 202
-- Data for Name: log_cadastro_usuario; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.log_cadastro_usuario (id_usuario_criador, id_usuario_novo, data_hora) FROM stdin;
\.


--
-- TOC entry 3000 (class 0 OID 16765)
-- Dependencies: 203
-- Data for Name: log_login; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.log_login (id_usuario, data_hora) FROM stdin;
\.


--
-- TOC entry 3002 (class 0 OID 16772)
-- Dependencies: 205
-- Data for Name: ocorrencia; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.ocorrencia (id_ocorrencia, ocorr_endereco_principal, ocorr_coordenada_latitude, ocorr_coordenada_longitude, ocorr_logradouro_id, agente_principal, agente_apoio_1, agente_apoio_2, ocorr_retorno, ocorr_referencia, data_lancamento, data_ocorrencia, ocorr_descricao, ocorr_origem, atendido_1, atendido_2, ocorr_cobrade, ocorr_natureza, ocorr_fotos, ocorr_prioridade, ocorr_analisado, ocorr_congelado, ocorr_encerrado) FROM stdin;
1	Logradouro	\N	\N	1	1	\N	\N	f	\N	2019-04-18	2019-03-18	pequeno tremor de terra	\N	1	\N	11110	terremoto	f	Média	t	f	f
5	Logradouro	\N	\N	1	1	\N	\N	f	\N	2019-04-22	2019-04-16	grande tremor de terra		\N	\N	11110		f	Alta	t	t	f
\.


--
-- TOC entry 3004 (class 0 OID 16783)
-- Dependencies: 207
-- Data for Name: pessoa; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.pessoa (id_pessoa, nome, cpf, outros_documentos, telefone, email) FROM stdin;
1	Jonath Wesley Herdt	08499496962	\N	47996118845	jonathherdt@gmail.com
\.


--
-- TOC entry 3005 (class 0 OID 16792)
-- Dependencies: 208
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: df_user
--

COPY public.usuario (id_usuario, nome, cpf, telefone, nivel_acesso) FROM stdin;
1	teste	12345678934	47997856423	1
\.


--
-- TOC entry 3018 (class 0 OID 0)
-- Dependencies: 197
-- Name: dados_login_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: df_user
--

SELECT pg_catalog.setval('public.dados_login_id_usuario_seq', 16, true);


--
-- TOC entry 3019 (class 0 OID 0)
-- Dependencies: 199
-- Name: endereco_logradouro_id_logradouro_seq; Type: SEQUENCE SET; Schema: public; Owner: df_user
--

SELECT pg_catalog.setval('public.endereco_logradouro_id_logradouro_seq', 8, true);


--
-- TOC entry 3020 (class 0 OID 0)
-- Dependencies: 204
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE SET; Schema: public; Owner: df_user
--

SELECT pg_catalog.setval('public.ocorrencia_id_ocorrencia_seq', 5, true);


--
-- TOC entry 3021 (class 0 OID 0)
-- Dependencies: 206
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE SET; Schema: public; Owner: df_user
--

SELECT pg_catalog.setval('public.pessoa_id_pessoa_seq', 1, true);


--
-- TOC entry 2835 (class 2606 OID 16735)
-- Name: cobrade cobrade_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.cobrade
    ADD CONSTRAINT cobrade_pkey PRIMARY KEY (codigo);


--
-- TOC entry 2837 (class 2606 OID 16880)
-- Name: dados_login dados_login_email_key; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.dados_login
    ADD CONSTRAINT dados_login_email_key UNIQUE (email);


--
-- TOC entry 2841 (class 2606 OID 16754)
-- Name: endereco_logradouro endereco_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.endereco_logradouro
    ADD CONSTRAINT endereco_pkey PRIMARY KEY (id_logradouro);


--
-- TOC entry 2843 (class 2606 OID 16759)
-- Name: log_alteracao_ocorr log_cadastro_ocorr_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_ocorr
    ADD CONSTRAINT log_cadastro_ocorr_pkey PRIMARY KEY (id_ocorrencia);


--
-- TOC entry 2845 (class 2606 OID 16764)
-- Name: log_cadastro_usuario log_cadastro_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_cadastro_usuario
    ADD CONSTRAINT log_cadastro_usuario_pk PRIMARY KEY (id_usuario_novo);


--
-- TOC entry 2839 (class 2606 OID 16743)
-- Name: dados_login log_in_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.dados_login
    ADD CONSTRAINT log_in_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2847 (class 2606 OID 16769)
-- Name: log_login log_login_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_login
    ADD CONSTRAINT log_login_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2849 (class 2606 OID 16780)
-- Name: ocorrencia ocorrencia_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_pkey PRIMARY KEY (id_ocorrencia);


--
-- TOC entry 2851 (class 2606 OID 16886)
-- Name: pessoa pessoa_cpf_key; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_cpf_key UNIQUE (cpf);


--
-- TOC entry 2853 (class 2606 OID 16791)
-- Name: pessoa pessoa_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_pkey PRIMARY KEY (id_pessoa);


--
-- TOC entry 2855 (class 2606 OID 16882)
-- Name: usuario usuario_cpf_key; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_cpf_key UNIQUE (cpf);


--
-- TOC entry 2857 (class 2606 OID 16796)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2858 (class 2606 OID 16797)
-- Name: log_alteracao_ocorr log_cadastro_ocorr_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_ocorr
    ADD CONSTRAINT log_cadastro_ocorr_id_fkey FOREIGN KEY (id_ocorrencia) REFERENCES public.ocorrencia(id_ocorrencia);


--
-- TOC entry 2859 (class 2606 OID 16802)
-- Name: log_alteracao_ocorr log_cadastro_ocorr_usuario; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_ocorr
    ADD CONSTRAINT log_cadastro_ocorr_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario);


--
-- TOC entry 2860 (class 2606 OID 16807)
-- Name: log_cadastro_usuario log_cadastro_usuario_usuario_cadastrado; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_cadastro_usuario
    ADD CONSTRAINT log_cadastro_usuario_usuario_cadastrado FOREIGN KEY (id_usuario_novo) REFERENCES public.usuario(id_usuario);


--
-- TOC entry 2861 (class 2606 OID 16812)
-- Name: log_cadastro_usuario log_cadastro_usuario_usuario_criador; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_cadastro_usuario
    ADD CONSTRAINT log_cadastro_usuario_usuario_criador FOREIGN KEY (id_usuario_criador) REFERENCES public.usuario(id_usuario);


--
-- TOC entry 2862 (class 2606 OID 16817)
-- Name: log_login log_login_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_login
    ADD CONSTRAINT log_login_id_fkey FOREIGN KEY (id_usuario) REFERENCES public.dados_login(id_usuario);


--
-- TOC entry 2863 (class 2606 OID 16822)
-- Name: ocorrencia ocorrencia_atendido_1_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_atendido_1_fkey FOREIGN KEY (atendido_1) REFERENCES public.pessoa(id_pessoa);


--
-- TOC entry 2864 (class 2606 OID 16827)
-- Name: ocorrencia ocorrencia_atendido_2_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_atendido_2_fkey FOREIGN KEY (atendido_2) REFERENCES public.pessoa(id_pessoa);


--
-- TOC entry 2865 (class 2606 OID 16832)
-- Name: ocorrencia ocorrencia_endereco; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_endereco FOREIGN KEY (ocorr_logradouro_id) REFERENCES public.endereco_logradouro(id_logradouro);


--
-- TOC entry 2866 (class 2606 OID 16837)
-- Name: ocorrencia ocorrencia_ocorr_cobrade_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_ocorr_cobrade_fkey FOREIGN KEY (ocorr_cobrade) REFERENCES public.cobrade(codigo);


--
-- TOC entry 2867 (class 2606 OID 16842)
-- Name: ocorrencia ocorrencia_ocorr_referencia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_ocorr_referencia_fkey FOREIGN KEY (ocorr_referencia) REFERENCES public.ocorrencia(id_ocorrencia);


--
-- TOC entry 2868 (class 2606 OID 16847)
-- Name: ocorrencia ocorrencia_usuario_apoio_1; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario_apoio_1 FOREIGN KEY (agente_apoio_1) REFERENCES public.usuario(id_usuario);


--
-- TOC entry 2869 (class 2606 OID 16852)
-- Name: ocorrencia ocorrencia_usuario_apoio_2; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario_apoio_2 FOREIGN KEY (agente_apoio_2) REFERENCES public.usuario(id_usuario);


--
-- TOC entry 2870 (class 2606 OID 16857)
-- Name: ocorrencia ocorrencia_usuario_principal; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario_principal FOREIGN KEY (agente_principal) REFERENCES public.usuario(id_usuario);


--
-- TOC entry 2871 (class 2606 OID 16862)
-- Name: usuario usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_id_fkey FOREIGN KEY (id_usuario) REFERENCES public.dados_login(id_usuario);


-- Completed on 2019-04-26 17:43:09 -03

--
-- PostgreSQL database dump complete
--

