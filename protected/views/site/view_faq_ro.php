<h3 class="text-center">FAQ</h3>

<p><b>- Ce putem gasi pe acest site?</b></p>
<p>- Acest site contine o arhiva de probleme de olimpiada cu sistemul de testare incorporat.</p>
<br/>
<p><b>- Ce trebuie sa faci pentru a participa la acest sistem?</b></p>
<p>- Pentru participare in asect sistem este deajuns da te inregistra si a trece in sectiunea �?’Sarcini’’, unde veti putea gasi problem de diferita complexitate si pe diferite tematici. Dupa incarcarea  rezolvarii problemei, programul va trece 10 teste, pentru fiecare test veti putea primi 10 puncte, suma punctelor pentru toate problemele rezolvate vor forma pozitia dumnevoastra in reiting.</p>
<br/>
<p><b>- Care este specificul problemelor si cum se le expediezi pe server?</b></p>
<p>- Toate problemele necesita lucrul cu fisierele <b>input.txt</b> si <b>output.txt</b>, destinate pentru citirea datelor initiale si extragerea rezultatului necesar. Expedierea rezolvarilor este posibila doar utilizatorilor inregistrati sub forma codului in fisierul cu formatul <b>*.pas</b> .</p>
<br/>
<p><b>- In ce limbaje poti expedia rezolvarea?</b></p>
<p>- Sistema verificarii prelucreaza numai programele scriese in libajul <b>Pascal</b>, utilizand compilatorul <b>Free Pascal 4.2.0</b>.</p>
<br/>
<p><b>- Unde pot descarca Free Pascal?</b></p>
<p>- Puteti descarca instal-ul Free Pascal 4.2.0. <a href='/files/fpc-2.4.0.i386-win32.exe'>aici</a></p>
<br/>
<p><b>- Ce se intampla dupa expedierea programului pe server?</b></p>
<p>- Fiecare program expediat se compileaza pe server, si in cazul compilarii reusite, el trece 10 teste. Ve-ti primi 10 puncte pentru test, daca: raspunsul dumnevoastra coincide cu raspunsul nostrum si se incadreaza in restrictiile de timp si memorie.</p>
<br/>
<p><b>- Cum de inteles ca problema e rezolvata corect?</b></p>
<p>- Daca programul s-a compilat reusit si ati acumulat 100 de puncte, atunci rezolvarea dumnevoastra este corecta.</p>
<br/>
<p><b>- Cum se formeaza reitingul?</b></p>
<p>- Reitingul se formeaza din suma punctelor celor mai reusite rezolvari. Daca dumnevoastra ati expediat la o problema 2 rezolvari, si una acumuleaza 50 de puncte , iar alta 70 de puncte , atunci se ia in consideratie numai 70 de puncte.</p>
<br/>
<p><b>- Ce trebuie de facut, daca nu gasiti aici raspuns la intrebarea dumnevoastra?</b></p>
<p>- Expediati intrebari pe adresa gregurco.vlad@gmail.com</p>
<br/>
<p><b>- Cum de inteles raspunsurile compilatorului?</b></p>
<p>- In arhiva rezolvarilor, vizavi de fiecare test, puteti observa urmatoarele mesaje:</p>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th width=10%>Mesajul</th> <th width=45%>Evenimentul</th> <th width=45%>Motivul</th>
        </tr>

        <tr>
            <td><font color=Green>Accepted</font></td>
            <td>Programul a trecut testele, raspunsul este corect si se incadreaza in limitele de timp si memorie.</td>
            <td align=center valign=middle>-</td>
        </tr>


        <tr>
            <td><font color=Red>Compilation error</font></td>
            <td>Programul a trecut compilare. Textul greselii il puteti urmari in arhiva problemei.</td>
            <td>In cod a fost comisa o greseala sintactica.</td>
        </tr>

        <tr>
            <td><font color=Red>Wrong answer</font></td>
            <td>Raspunsul dvs nu coincide cu raspunsurile administratiei.</td>
            <td>In cod a fost comisa o greseala logica.</td>
        </tr>

        <tr>
            <td><font color=Red>Time limit</font></td>
            <td>Timpul de executie a programului a depasit limita.</td>
            <td>Trebuie sa modificati algoritmul sau sa-l optimizati.</td>
        </tr>

        <tr>
            <td><font color=Red>File doesn't exist</font></td>
            <td valign=top>Nu a fost gasit fisierul de iesire.</td>
            <td>Verificati daca corect ati numit fisierul de iesire si daca el se creeaza in toate situatiile.</td>
        </tr>

        <tr>
            <td>Waiting</td>
            <td>Asteptare</td>
            <td>Programul se afla in asteptare de compilare</td>
        </tr>

        <tr>
            <td>Compiling</td>
            <td>Compilarea programului</td>
            <td>Este nevoie de timp pentru creearea fisierului de executie</td>
        </tr>

        <tr>
            <td>Running</td>
            <td>Testarea programului</td>
            <td>Are loc testarea programei executind codul pentru fiecare test existent</td>
        </tr>
    </table>
</div>