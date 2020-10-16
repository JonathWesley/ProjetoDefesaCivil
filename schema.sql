--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2 (Debian 12.2-2.pgdg90+1)
-- Dumped by pg_dump version 12.2 (Debian 12.2-2.pgdg90+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: chamado; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.chamado (
    id_chamado integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    origem character varying(255) NOT NULL,
    descricao character varying(750) NOT NULL,
    endereco_principal character(10) NOT NULL,
    chamado_logradouro_id integer,
    latitude numeric(16,14),
    longitude numeric(17,14),
    pessoa_id integer,
    usado boolean DEFAULT false NOT NULL,
    agente_id integer NOT NULL,
    prioridade character varying(10) NOT NULL,
    distribuicao integer,
    nome_pessoa character varying(255),
    cancelado boolean DEFAULT false,
    motivo character varying(255)
);


ALTER TABLE public.chamado OWNER TO df_user;

--
-- Name: chamado_id_chamado_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.chamado_id_chamado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chamado_id_chamado_seq OWNER TO df_user;

--
-- Name: chamado_id_chamado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.chamado_id_chamado_seq OWNED BY public.chamado.id_chamado;


--
-- Name: cobrade; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.cobrade (
    codigo character(5) NOT NULL,
    categoria character varying(255) NOT NULL,
    grupo character varying(255) NOT NULL,
    subgrupo character varying(255) NOT NULL,
    tipo character varying(255),
    subtipo character varying(255),
    ativo boolean DEFAULT true NOT NULL
);


ALTER TABLE public.cobrade OWNER TO df_user;

--
-- Name: dados_login; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.dados_login (
    id_usuario integer NOT NULL,
    email character varying(255) NOT NULL,
    senha character(60) NOT NULL,
    ativo boolean DEFAULT true NOT NULL
);


ALTER TABLE public.dados_login OWNER TO df_user;

--
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
-- Name: dados_login_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.dados_login_id_usuario_seq OWNED BY public.dados_login.id_usuario;


--
-- Name: endereco_logradouro; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.endereco_logradouro (
    id_logradouro integer NOT NULL,
    cep character(8),
    cidade character varying(255),
    bairro character varying(255),
    logradouro character varying(255) NOT NULL,
    numero character varying(255) NOT NULL,
    referencia character varying(255)
);


ALTER TABLE public.endereco_logradouro OWNER TO df_user;

--
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
-- Name: endereco_logradouro_id_logradouro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.endereco_logradouro_id_logradouro_seq OWNED BY public.endereco_logradouro.id_logradouro;


--
-- Name: interdicao; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.interdicao (
    id_interdicao integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    tipo character(7) NOT NULL,
    id_ocorrencia integer NOT NULL,
    motivo character varying(32) NOT NULL,
    descricao_interdicao character varying(120) NOT NULL,
    danos_aparentes character varying(120) NOT NULL,
    bens_afetados character varying(10) NOT NULL,
    interdicao_ativa boolean DEFAULT true NOT NULL
);


ALTER TABLE public.interdicao OWNER TO df_user;

--
-- Name: interdicao_id_interdicao_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.interdicao_id_interdicao_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.interdicao_id_interdicao_seq OWNER TO df_user;

--
-- Name: interdicao_id_interdicao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.interdicao_id_interdicao_seq OWNED BY public.interdicao.id_interdicao;


--
-- Name: log_alteracao_usuario; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_alteracao_usuario (
    id_usuario_modificador integer NOT NULL,
    id_usuario_alterado integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    acao character(9) NOT NULL,
    id_alteracao integer NOT NULL
);


ALTER TABLE public.log_alteracao_usuario OWNER TO df_user;

--
-- Name: log_alteracao_usuario_id_alteracao_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.log_alteracao_usuario_id_alteracao_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_alteracao_usuario_id_alteracao_seq OWNER TO df_user;

--
-- Name: log_alteracao_usuario_id_alteracao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.log_alteracao_usuario_id_alteracao_seq OWNED BY public.log_alteracao_usuario.id_alteracao;


--
-- Name: log_chamado; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_chamado (
    id_log_chamado integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    acao character(9) NOT NULL,
    id_chamado integer NOT NULL,
    id_usuario integer NOT NULL
);


ALTER TABLE public.log_chamado OWNER TO df_user;

--
-- Name: log_chamado_id_log_chamado_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.log_chamado_id_log_chamado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_chamado_id_log_chamado_seq OWNER TO df_user;

--
-- Name: log_chamado_id_log_chamado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.log_chamado_id_log_chamado_seq OWNED BY public.log_chamado.id_log_chamado;


--
-- Name: log_endereco; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_endereco (
    id_log_endereco integer NOT NULL,
    id_logradouro integer NOT NULL,
    id_usuario integer NOT NULL,
    data_hora timestamp without time zone NOT NULL
);


ALTER TABLE public.log_endereco OWNER TO df_user;

--
-- Name: log_endereco_id_log_endereco_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.log_endereco_id_log_endereco_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_endereco_id_log_endereco_seq OWNER TO df_user;

--
-- Name: log_endereco_id_log_endereco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.log_endereco_id_log_endereco_seq OWNED BY public.log_endereco.id_log_endereco;


--
-- Name: log_interdicao; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_interdicao (
    id_log_interdicao integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    acao character varying(13) DEFAULT 'interditar'::character varying NOT NULL,
    id_usuario integer NOT NULL,
    id_interdicao integer NOT NULL
);


ALTER TABLE public.log_interdicao OWNER TO df_user;

--
-- Name: log_interdicao_id_log_interdicao_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.log_interdicao_id_log_interdicao_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_interdicao_id_log_interdicao_seq OWNER TO df_user;

--
-- Name: log_interdicao_id_log_interdicao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.log_interdicao_id_log_interdicao_seq OWNED BY public.log_interdicao.id_log_interdicao;


--
-- Name: log_login; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_login (
    id_usuario integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    id_login integer NOT NULL
);


ALTER TABLE public.log_login OWNER TO df_user;

--
-- Name: log_login_id_login_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.log_login_id_login_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_login_id_login_seq OWNER TO df_user;

--
-- Name: log_login_id_login_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.log_login_id_login_seq OWNED BY public.log_login.id_login;


--
-- Name: log_pessoa; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.log_pessoa (
    id_log integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    id_pessoa_cadastrada integer NOT NULL,
    id_usuario_criador integer NOT NULL
);


ALTER TABLE public.log_pessoa OWNER TO df_user;

--
-- Name: log_pessoa_id_log_seq; Type: SEQUENCE; Schema: public; Owner: df_user
--

CREATE SEQUENCE public.log_pessoa_id_log_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_pessoa_id_log_seq OWNER TO df_user;

--
-- Name: log_pessoa_id_log_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.log_pessoa_id_log_seq OWNED BY public.log_pessoa.id_log;


--
-- Name: ocorrencia; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.ocorrencia (
    id_ocorrencia integer NOT NULL,
    chamado_id integer,
    ocorr_endereco_principal character(10) NOT NULL,
    ocorr_coordenada_latitude numeric(16,14),
    ocorr_coordenada_longitude numeric(17,14),
    ocorr_logradouro_id integer,
    agente_principal integer NOT NULL,
    agente_apoio_1 integer,
    agente_apoio_2 integer,
    data_ocorrencia date NOT NULL,
    ocorr_descricao text,
    ocorr_origem character varying(255) NOT NULL,
    atendido_1 integer,
    atendido_2 integer,
    ocorr_cobrade character varying(5) NOT NULL,
    ocorr_fotos boolean NOT NULL,
    ocorr_prioridade character varying(10) NOT NULL,
    ocorr_analisado boolean NOT NULL,
    ocorr_congelado boolean NOT NULL,
    ocorr_encerrado boolean NOT NULL,
    ativo boolean DEFAULT true NOT NULL,
    usuario_criador integer NOT NULL,
    data_alteracao timestamp without time zone NOT NULL,
    ocorr_referencia integer,
    ocorr_titulo character varying(120) NOT NULL,
    fotos text[],
    nome_pessoa1 character varying(255),
    nome_pessoa2 character varying(255)
);


ALTER TABLE public.ocorrencia OWNER TO df_user;

--
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
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.ocorrencia_id_ocorrencia_seq OWNED BY public.ocorrencia.id_ocorrencia;


--
-- Name: pessoa; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.pessoa (
    id_pessoa integer NOT NULL,
    nome character varying(255),
    cpf character(14),
    outros_documentos character varying(20),
    celular character(15),
    email character varying(255),
    telefone character(14)
);


ALTER TABLE public.pessoa OWNER TO df_user;

--
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
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: df_user
--

ALTER SEQUENCE public.pessoa_id_pessoa_seq OWNED BY public.pessoa.id_pessoa;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: df_user
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nome character varying(255) NOT NULL,
    cpf character(14),
    telefone character(15),
    nivel_acesso character(1) NOT NULL,
    foto text
);


ALTER TABLE public.usuario OWNER TO df_user;

--
-- Name: chamado id_chamado; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.chamado ALTER COLUMN id_chamado SET DEFAULT nextval('public.chamado_id_chamado_seq'::regclass);


--
-- Name: dados_login id_usuario; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.dados_login ALTER COLUMN id_usuario SET DEFAULT nextval('public.dados_login_id_usuario_seq'::regclass);


--
-- Name: endereco_logradouro id_logradouro; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.endereco_logradouro ALTER COLUMN id_logradouro SET DEFAULT nextval('public.endereco_logradouro_id_logradouro_seq'::regclass);


--
-- Name: interdicao id_interdicao; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.interdicao ALTER COLUMN id_interdicao SET DEFAULT nextval('public.interdicao_id_interdicao_seq'::regclass);


--
-- Name: log_alteracao_usuario id_alteracao; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_usuario ALTER COLUMN id_alteracao SET DEFAULT nextval('public.log_alteracao_usuario_id_alteracao_seq'::regclass);


--
-- Name: log_chamado id_log_chamado; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_chamado ALTER COLUMN id_log_chamado SET DEFAULT nextval('public.log_chamado_id_log_chamado_seq'::regclass);


--
-- Name: log_endereco id_log_endereco; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_endereco ALTER COLUMN id_log_endereco SET DEFAULT nextval('public.log_endereco_id_log_endereco_seq'::regclass);


--
-- Name: log_interdicao id_log_interdicao; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_interdicao ALTER COLUMN id_log_interdicao SET DEFAULT nextval('public.log_interdicao_id_log_interdicao_seq'::regclass);


--
-- Name: log_login id_login; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_login ALTER COLUMN id_login SET DEFAULT nextval('public.log_login_id_login_seq'::regclass);


--
-- Name: log_pessoa id_log; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_pessoa ALTER COLUMN id_log SET DEFAULT nextval('public.log_pessoa_id_log_seq'::regclass);


--
-- Name: ocorrencia id_ocorrencia; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia ALTER COLUMN id_ocorrencia SET DEFAULT nextval('public.ocorrencia_id_ocorrencia_seq'::regclass);


--
-- Name: pessoa id_pessoa; Type: DEFAULT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.pessoa ALTER COLUMN id_pessoa SET DEFAULT nextval('public.pessoa_id_pessoa_seq'::regclass);


--
-- Name: chamado chamado_pk; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.chamado
    ADD CONSTRAINT chamado_pk PRIMARY KEY (id_chamado);


--
-- Name: cobrade cobrade_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.cobrade
    ADD CONSTRAINT cobrade_pkey PRIMARY KEY (codigo);


--
-- Name: endereco_logradouro endereco_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.endereco_logradouro
    ADD CONSTRAINT endereco_pkey PRIMARY KEY (id_logradouro);


--
-- Name: interdicao id_interdicao; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.interdicao
    ADD CONSTRAINT id_interdicao PRIMARY KEY (id_interdicao);


--
-- Name: log_alteracao_usuario log_alteracao_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_usuario
    ADD CONSTRAINT log_alteracao_usuario_pk PRIMARY KEY (id_alteracao);


--
-- Name: log_chamado log_chamado_pk; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_chamado
    ADD CONSTRAINT log_chamado_pk PRIMARY KEY (id_log_chamado);


--
-- Name: log_endereco log_endereco_pk; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_endereco
    ADD CONSTRAINT log_endereco_pk PRIMARY KEY (id_log_endereco);


--
-- Name: dados_login log_in_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.dados_login
    ADD CONSTRAINT log_in_pkey PRIMARY KEY (id_usuario);


--
-- Name: log_interdicao log_interdicao_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_interdicao
    ADD CONSTRAINT log_interdicao_pkey PRIMARY KEY (id_log_interdicao);


--
-- Name: log_login log_login_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_login
    ADD CONSTRAINT log_login_pkey PRIMARY KEY (id_login);


--
-- Name: log_pessoa log_pessoa_pk; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_pessoa
    ADD CONSTRAINT log_pessoa_pk PRIMARY KEY (id_log);


--
-- Name: ocorrencia ocorrencia_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_pkey PRIMARY KEY (id_ocorrencia);


--
-- Name: pessoa pessoa_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.pessoa
    ADD CONSTRAINT pessoa_pkey PRIMARY KEY (id_pessoa);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: chamado chamado_agente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.chamado
    ADD CONSTRAINT chamado_agente_id_fkey FOREIGN KEY (agente_id) REFERENCES public.usuario(id_usuario);


--
-- Name: chamado chamado_endereco_logradouro; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.chamado
    ADD CONSTRAINT chamado_endereco_logradouro FOREIGN KEY (chamado_logradouro_id) REFERENCES public.endereco_logradouro(id_logradouro);


--
-- Name: chamado chamado_pessoa; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.chamado
    ADD CONSTRAINT chamado_pessoa FOREIGN KEY (pessoa_id) REFERENCES public.pessoa(id_pessoa);


--
-- Name: interdicao id_ocorrencia_fk; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.interdicao
    ADD CONSTRAINT id_ocorrencia_fk FOREIGN KEY (id_ocorrencia) REFERENCES public.ocorrencia(id_ocorrencia);


--
-- Name: log_alteracao_usuario log_cadastro_usuario_usuario_cadastrado; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_usuario
    ADD CONSTRAINT log_cadastro_usuario_usuario_cadastrado FOREIGN KEY (id_usuario_alterado) REFERENCES public.usuario(id_usuario);


--
-- Name: log_alteracao_usuario log_cadastro_usuario_usuario_criador; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_alteracao_usuario
    ADD CONSTRAINT log_cadastro_usuario_usuario_criador FOREIGN KEY (id_usuario_modificador) REFERENCES public.usuario(id_usuario);


--
-- Name: log_chamado log_chamado_chamado; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_chamado
    ADD CONSTRAINT log_chamado_chamado FOREIGN KEY (id_chamado) REFERENCES public.chamado(id_chamado);


--
-- Name: log_chamado log_chamado_usuario; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_chamado
    ADD CONSTRAINT log_chamado_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario);


--
-- Name: log_endereco log_endereco_endereco_logradouro; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_endereco
    ADD CONSTRAINT log_endereco_endereco_logradouro FOREIGN KEY (id_logradouro) REFERENCES public.endereco_logradouro(id_logradouro);


--
-- Name: log_endereco log_endereco_usuario; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_endereco
    ADD CONSTRAINT log_endereco_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario);


--
-- Name: log_interdicao log_interdicao_id_interdicao_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_interdicao
    ADD CONSTRAINT log_interdicao_id_interdicao_fkey FOREIGN KEY (id_interdicao) REFERENCES public.interdicao(id_interdicao);


--
-- Name: log_interdicao log_interdicao_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_interdicao
    ADD CONSTRAINT log_interdicao_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario);


--
-- Name: log_login log_login_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_login
    ADD CONSTRAINT log_login_id_fkey FOREIGN KEY (id_usuario) REFERENCES public.dados_login(id_usuario);


--
-- Name: log_pessoa log_pessoa_pessoa; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_pessoa
    ADD CONSTRAINT log_pessoa_pessoa FOREIGN KEY (id_pessoa_cadastrada) REFERENCES public.pessoa(id_pessoa);


--
-- Name: log_pessoa log_pessoa_usuario; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.log_pessoa
    ADD CONSTRAINT log_pessoa_usuario FOREIGN KEY (id_usuario_criador) REFERENCES public.usuario(id_usuario);


--
-- Name: ocorrencia ocorrencia_atendido_1_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_atendido_1_fkey FOREIGN KEY (atendido_1) REFERENCES public.pessoa(id_pessoa);


--
-- Name: ocorrencia ocorrencia_atendido_2_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_atendido_2_fkey FOREIGN KEY (atendido_2) REFERENCES public.pessoa(id_pessoa);


--
-- Name: ocorrencia ocorrencia_chamado; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_chamado FOREIGN KEY (chamado_id) REFERENCES public.chamado(id_chamado);


--
-- Name: ocorrencia ocorrencia_endereco; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_endereco FOREIGN KEY (ocorr_logradouro_id) REFERENCES public.endereco_logradouro(id_logradouro);


--
-- Name: ocorrencia ocorrencia_ocorr_cobrade_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_ocorr_cobrade_fkey FOREIGN KEY (ocorr_cobrade) REFERENCES public.cobrade(codigo);


--
-- Name: ocorrencia ocorrencia_ocorr_referencia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_ocorr_referencia_fkey FOREIGN KEY (ocorr_referencia) REFERENCES public.ocorrencia(id_ocorrencia);


--
-- Name: ocorrencia ocorrencia_usuario; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario FOREIGN KEY (usuario_criador) REFERENCES public.usuario(id_usuario);


--
-- Name: ocorrencia ocorrencia_usuario_apoio_1; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario_apoio_1 FOREIGN KEY (agente_apoio_1) REFERENCES public.usuario(id_usuario);


--
-- Name: ocorrencia ocorrencia_usuario_apoio_2; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario_apoio_2 FOREIGN KEY (agente_apoio_2) REFERENCES public.usuario(id_usuario);


--
-- Name: ocorrencia ocorrencia_usuario_principal; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_usuario_principal FOREIGN KEY (agente_principal) REFERENCES public.usuario(id_usuario);


--
-- Name: chamado usuario; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.chamado
    ADD CONSTRAINT usuario FOREIGN KEY (distribuicao) REFERENCES public.usuario(id_usuario);


--
-- Name: usuario usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: df_user
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_id_fkey FOREIGN KEY (id_usuario) REFERENCES public.dados_login(id_usuario);


--
-- PostgreSQL database dump complete
--

