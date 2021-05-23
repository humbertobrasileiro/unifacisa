SELECT C.CODCURSO, count(A.CODPESSOA) as QtdAlunosMat FROM saluno A
inner join shabilitacaoaluno H on H.CODCOLIGADA = A.CODCOLIGADA and H.RA = A.RA
inner join shabilitacaofilial F on F.CODCOLIGADA = H.CODCOLIGADA and F.IDHABILITACAOFILIAL = H.IDHABILITACAOFILIAL
inner join scurso C on C.CODCURSO = F.CODCURSO and C.CODCOLIGADA = A.CODCOLIGADA
where trim(F.CODCURSO) in ('308', '309') and H.CODSTATUS = 1
group by C.CODCURSO