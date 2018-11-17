import os
import commands
import urllib

i = 0

#urlParticipante = 'https://api.mockaroo.com/api/9ed5fa70?count=1000&key=97631cb0'
#urlAcesso = "https://api.mockaroo.com/api/e1a8f410?count=1000&key=97631cb0"
#urlCartao = "https://api.mockaroo.com/api/721873f0?count=1000&key=97631cb0"
#urlArtigo = "https://api.mockaroo.com/api/7f733c00?count=1000&key=97631cb0"
#urlInfoCongresso = "https://api.mockaroo.com/api/2e04caa0?count=1&key=97631cb0"
urlParticipanteArtigo = "https://api.mockaroo.com/api/4ee37860?count=1000&key=97631cb0"
urlRevisorArtigo = "https://api.mockaroo.com/api/18172990?count=1000&key=97631cb0"

while i < 10:

    #urllib.urlretrieve(urlParticipante, "Participante.sql")
    #print "Download Participante.sql"
    #urllib.urlretrieve(urlAcesso, "Acesso.sql")
    #print "Download Acesso.sql"
    #urllib.urlretrieve(urlCartao, "Cartao.sql")
    #print "Download Cartao.sql"
    #urllib.urlretrieve(urlArtigo, "Artigo.sql")
    #print "Download Artigo.sql"
    urllib.urlretrieve(urlParticipanteArtigo, "Participante_Artigo.sql")
    print ("Download Participante_Artigo.sql")
    urllib.urlretrieve(urlRevisorArtigo, "Revisor_Artigo.sql")
    print ("Revisor_Artigo.sql")

    #x = os.system("mysql -h localhost -u root SISTEMA_ARTIGOS < Participante.sql")
    #print(x)
    #x = os.system("mysql -h localhost -u root SISTEMA_ARTIGOS < Acesso.sql")
    #print(x)
    #x = os.system("mysql -h localhost -u root SISTEMA_ARTIGOS < Cartao.sql")
    #print(x)
    #x = os.system("mysql -h localhost -u root SISTEMA_ARTIGOS < Artigo.sql")
    #print(x)
    x = os.system("mysql -h localhost -u root SISTEMA_ARTIGOS < Participante_Artigo.sql")
    print(x)
    x = os.system("mysql -h localhost -u root SISTEMA_ARTIGOS < Revisor_Artigo.sql")
    print(x)

    i = i + 1