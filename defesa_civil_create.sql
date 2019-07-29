-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2019-07-29 01:09:45.786

-- tables
-- Table: chamado
CREATE TABLE public.chamado (
    id_chamado serial  NOT NULL,
    data_hora timestamp  NOT NULL,
    origem varchar(255)  NOT NULL,
    telefone char(11)  NOT NULL,
    descricao varchar(100)  NOT NULL,
    endereco_principal char(10)  NOT NULL,
    chamado_logradouro_id int  NULL,
    latitude real  NULL,
    longitude real  NULL,
    pessoa_id int  NOT NULL,
    usado boolean  NOT NULL,
    CONSTRAINT chamado_pk PRIMARY KEY (id_chamado)
);

-- Table: cobrade
CREATE TABLE public.cobrade (
    codigo char(5)  NOT NULL,
    categoria varchar(255)  NOT NULL,
    grupo varchar(255)  NOT NULL,
    subgrupo varchar(255)  NOT NULL,
    tipo varchar(255)  NOT NULL,
    subtipo varchar(255)  NULL,
    ativo boolean  NOT NULL DEFAULT true,
    CONSTRAINT cobrade_pkey PRIMARY KEY (codigo)
);

-- Table: dados_login
CREATE TABLE public.dados_login (
    id_usuario serial  NOT NULL,
    email varchar(255)  NOT NULL,
    senha char(60)  NOT NULL,
    ativo boolean  NULL,
    CONSTRAINT log_in_pkey PRIMARY KEY (id_usuario)
);

-- Table: endereco_logradouro
CREATE TABLE public.endereco_logradouro (
    id_logradouro serial  NOT NULL,
    cep char(8)  NULL,
    cidade varchar(255)  NULL,
    bairro varchar(255)  NULL,
    logradouro varchar(255)  NOT NULL,
    numero varchar(255)  NOT NULL,
    referencia varchar(255)  NULL,
    CONSTRAINT endereco_pkey PRIMARY KEY (id_logradouro)
);

-- Table: log_alteracao_usuario
CREATE TABLE public.log_alteracao_usuario (
    id_usuario_modificador integer  NOT NULL,
    id_usuario_alterado integer  NOT NULL,
    data_hora timestamp  NOT NULL,
    acao char(9)  NOT NULL,
    id_alteracao serial  NOT NULL,
    CONSTRAINT novo_usuario UNIQUE (id_usuario_alterado) NOT DEFERRABLE  INITIALLY IMMEDIATE,
    CONSTRAINT log_alteracao_usuario_pk PRIMARY KEY (id_alteracao)
);

-- Table: log_chamado
CREATE TABLE log_chamado (
    id_log_chamado serial  NOT NULL,
    data_hora timestamp  NOT NULL,
    acao char(9)  NOT NULL,
    id_chamado int  NOT NULL,
    id_usuario int  NOT NULL,
    CONSTRAINT log_chamado_pk PRIMARY KEY (id_log_chamado)
);

-- Table: log_endereco
CREATE TABLE log_endereco (
    id_log_endereco serial  NOT NULL,
    id_logradouro int  NOT NULL,
    id_usuario int  NOT NULL,
    CONSTRAINT log_endereco_pk PRIMARY KEY (id_log_endereco)
);

-- Table: log_login
CREATE TABLE public.log_login (
    id_usuario integer  NOT NULL,
    data_hora timestamp  NOT NULL,
    id_login serial  NOT NULL,
    CONSTRAINT log_login_pkey PRIMARY KEY (id_login)
);

-- Table: log_pessoa
CREATE TABLE log_pessoa (
    id_log serial  NOT NULL,
    data_hora timestamp  NOT NULL,
    id_pessoa_cadastrada int  NOT NULL,
    id_usuario_criador integer  NOT NULL,
    CONSTRAINT log_pessoa_pk PRIMARY KEY (id_log)
);

-- Table: ocorrencia
CREATE TABLE public.ocorrencia (
    id_ocorrencia serial  NOT NULL,
    chamado_id int  NULL,
    ocorr_endereco_principal char(10)  NOT NULL,
    ocorr_coordenada_latitude real  NULL,
    ocorr_coordenada_longitude real  NULL,
    ocorr_logradouro_id int  NULL,
    agente_principal integer  NOT NULL,
    agente_apoio_1 integer  NULL,
    agente_apoio_2 integer  NULL,
    data_lancamento date  NOT NULL,
    data_ocorrencia date  NOT NULL,
    ocorr_descricao varchar(100)  NULL,
    ocorr_origem varchar(255)  NULL,
    atendido_1 integer  NULL,
    atendido_2 integer  NULL,
    ocorr_cobrade varchar(5)  NOT NULL,
    cobrade_descricao varchar(255)  NULL,
    ocorr_fotos boolean  NOT NULL,
    fotos bytea  NULL,
    ocorr_prioridade varchar(10)  NOT NULL,
    ocorr_analisado boolean  NOT NULL,
    ocorr_congelado boolean  NOT NULL,
    ocorr_encerrado boolean  NOT NULL,
    ativo boolean  NOT NULL DEFAULT true,
    usuario_criador integer  NOT NULL,
    data_alteracao timestamp  NOT NULL,
    ocorr_referencia integer  NULL,
    CONSTRAINT ocorrencia_pkey PRIMARY KEY (id_ocorrencia)
);

-- Table: pessoa
CREATE TABLE public.pessoa (
    id_pessoa serial  NOT NULL,
    nome varchar(255)  NULL,
    cpf char(11)  NULL,
    outros_documentos varchar(20)  NULL,
    telefone char(11)  NULL,
    email varchar(255)  NULL,
    CONSTRAINT pessoa_pkey PRIMARY KEY (id_pessoa)
);

-- Table: usuario
CREATE TABLE public.usuario (
    id_usuario integer  NOT NULL,
    nome varchar(255)  NOT NULL,
    cpf char(11)  NOT NULL,
    telefone char(11)  NULL,
    nivel_acesso char(1)  NOT NULL,
    foto oid  NULL,
    CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario)
);

-- foreign keys
-- Reference: chamado_endereco_logradouro (table: chamado)
ALTER TABLE chamado ADD CONSTRAINT chamado_endereco_logradouro
    FOREIGN KEY (chamado_logradouro_id)
    REFERENCES public.endereco_logradouro (id_logradouro)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: chamado_pessoa (table: chamado)
ALTER TABLE chamado ADD CONSTRAINT chamado_pessoa
    FOREIGN KEY (pessoa_id)
    REFERENCES public.pessoa (id_pessoa)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_cadastro_usuario_usuario_cadastrado (table: log_alteracao_usuario)
ALTER TABLE public.log_alteracao_usuario ADD CONSTRAINT log_cadastro_usuario_usuario_cadastrado
    FOREIGN KEY (id_usuario_alterado)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_cadastro_usuario_usuario_criador (table: log_alteracao_usuario)
ALTER TABLE public.log_alteracao_usuario ADD CONSTRAINT log_cadastro_usuario_usuario_criador
    FOREIGN KEY (id_usuario_modificador)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_chamado_chamado (table: log_chamado)
ALTER TABLE log_chamado ADD CONSTRAINT log_chamado_chamado
    FOREIGN KEY (id_chamado)
    REFERENCES chamado (id_chamado)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_chamado_usuario (table: log_chamado)
ALTER TABLE log_chamado ADD CONSTRAINT log_chamado_usuario
    FOREIGN KEY (id_usuario)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_endereco_endereco_logradouro (table: log_endereco)
ALTER TABLE log_endereco ADD CONSTRAINT log_endereco_endereco_logradouro
    FOREIGN KEY (id_logradouro)
    REFERENCES public.endereco_logradouro (id_logradouro)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_endereco_usuario (table: log_endereco)
ALTER TABLE log_endereco ADD CONSTRAINT log_endereco_usuario
    FOREIGN KEY (id_usuario)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_login_id_fkey (table: log_login)
ALTER TABLE public.log_login ADD CONSTRAINT log_login_id_fkey
    FOREIGN KEY (id_usuario)
    REFERENCES public.dados_login (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_pessoa_pessoa (table: log_pessoa)
ALTER TABLE log_pessoa ADD CONSTRAINT log_pessoa_pessoa
    FOREIGN KEY (id_pessoa_cadastrada)
    REFERENCES public.pessoa (id_pessoa)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: log_pessoa_usuario (table: log_pessoa)
ALTER TABLE log_pessoa ADD CONSTRAINT log_pessoa_usuario
    FOREIGN KEY (id_usuario_criador)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_atendido_1_fkey (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_atendido_1_fkey
    FOREIGN KEY (atendido_1)
    REFERENCES public.pessoa (id_pessoa)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_atendido_2_fkey (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_atendido_2_fkey
    FOREIGN KEY (atendido_2)
    REFERENCES public.pessoa (id_pessoa)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_chamado (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_chamado
    FOREIGN KEY (chamado_id)
    REFERENCES chamado (id_chamado)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_endereco (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_endereco
    FOREIGN KEY (ocorr_logradouro_id)
    REFERENCES public.endereco_logradouro (id_logradouro)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_ocorr_cobrade_fkey (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_ocorr_cobrade_fkey
    FOREIGN KEY (ocorr_cobrade)
    REFERENCES public.cobrade (codigo)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_ocorr_referencia_fkey (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_ocorr_referencia_fkey
    FOREIGN KEY (ocorr_referencia)
    REFERENCES public.ocorrencia (id_ocorrencia)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_usuario (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_usuario
    FOREIGN KEY (usuario_criador)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_usuario_apoio_1 (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_usuario_apoio_1
    FOREIGN KEY (agente_apoio_1)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_usuario_apoio_2 (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_usuario_apoio_2
    FOREIGN KEY (agente_apoio_2)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: ocorrencia_usuario_principal (table: ocorrencia)
ALTER TABLE public.ocorrencia ADD CONSTRAINT ocorrencia_usuario_principal
    FOREIGN KEY (agente_principal)
    REFERENCES public.usuario (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: usuario_id_fkey (table: usuario)
ALTER TABLE public.usuario ADD CONSTRAINT usuario_id_fkey
    FOREIGN KEY (id_usuario)
    REFERENCES public.dados_login (id_usuario)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- End of file.

