PGDMP                  	    |            bancoex    16.2    16.2     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16414    bancoex    DATABASE     ~   CREATE DATABASE bancoex WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE bancoex;
                postgres    false            �            1259    16415    usuario    TABLE       CREATE TABLE public.usuario (
    usumail character varying(200) NOT NULL,
    ususenha character varying(200) NOT NULL,
    usunome character varying(200) NOT NULL,
    usustatus character varying(200) NOT NULL,
    usucodigo integer,
    usutipo "char"
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            �          0    16415    usuario 
   TABLE DATA           \   COPY public.usuario (usumail, ususenha, usunome, usustatus, usucodigo, usutipo) FROM stdin;
    public          postgres    false    215   �       �   Z   x�KL�uH�M���K���LL�`G�? �*�,�/�(M�GR��Y�U�d�e^��R��˕�W�oh���ʳE�+PLu� �(�     