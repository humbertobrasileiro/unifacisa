SELECT P.CODIGO, P.NOME as NOME_ALUNO, C.NOME as NOME_CURSO, A.RA FROM ppessoa P
inner join saluno A on A.CODPESSOA = P.CODIGO
inner join shabilitacaoaluno H on H.CODCOLIGADA = A.CODCOLIGADA and H.RA = A.RA
inner join shabilitacaofilial F on trim(F.CODCURSO) in ('308', '309') and F.CODCOLIGADA = H.CODCOLIGADA and F.IDHABILITACAOFILIAL = H.IDHABILITACAOFILIAL
inner join scurso C on C.CODCURSO = F.CODCURSO and C.CODCOLIGADA = A.CODCOLIGADA
order by A.RA