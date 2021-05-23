select A.CODPESSOA, P.NOME as NOME_ALUNO, A.RA, A.CODCOLIGADA, H.IDHABILITACAOFILIAL, H.DTINGRESSO, H.CRE, F.CODFILIAL, F.CODCURSO, C.NOME as NOME_CURSO, F.CODHABILITACAO, C.HABILITACAO from ppessoa P
inner join saluno A on A.CODPESSOA = P.CODIGO
inner join shabilitacaoaluno H on H.RA = A.RA and H.CODCOLIGADA = A.CODCOLIGADA and H.CODSTATUS = 1
inner join shabilitacaofilial F on F.CODCOLIGADA = A.CODCOLIGADA and F.IDHABILITACAOFILIAL = H.IDHABILITACAOFILIAL
inner join scurso C on C.CODCURSO = F.CODCURSO