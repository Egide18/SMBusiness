<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SUNGI MBEMBA BUSINESS — Private Care</title>
  <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
  <meta name="description" content="SUNGI MBEMBA BUSINESS offre des services de kinésithérapie, soins infirmiers, massage et prise en charge des personnes âgées. Disponible uniquement à Kinshasa." />
  <meta name="description"  content="Kinésitheraptie à kinshasa, Massage à kinshasa, soins infirmier, prise en charge">
  <style>
    :root{
      --bg:#0f172a;
      --card:#111827;
      --muted:#9ca3af;
      --text:#f8fafc;
      --accent:#22c55e;
      --accent-2:#10b981;
      --danger:#ef4444;
      --brand:#38bdf8;
      --ring: 0 0 0 3px rgba(242, 242, 242, 0.28);
    }
    *{
        box-sizing:border-box
    }
    html,body{
        margin:0;
        padding:0;
        background:linear-gradient(180deg,#0b1220,#0f172a 30%,#0b1220 100%);
        color:var(--text);
        font-family:system-ui,"Helvetica Neue",Arial,"Noto Sans","Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
        line-height:1.5
    }
    a{
        color:var(--brand);
        text-decoration:none;
        text-transform: none;
        text-underline-offset:none;
    }
    a:hover{
        text-decoration:underline
    }
    header{
        position:sticky;
        top:0;
        z-index:50;
        background:rgba(2,6,23,.6);
        backdrop-filter: blur(10px);
        border-bottom:1px solid rgba(148,163,184,.15)
    }
    .container{
        max-width:1100px;
        margin:0 auto;
        padding:0 16px
    }
    .nav{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:16px;
        padding:12px 0
    }
    .brand{
        display:flex;
        align-items:center;
        gap:12px;
        font-weight:800;
        letter-spacing:.3px
    }
    .logo{
        width:40px;
        height:40px;
        border-radius:5px;
        background: url(assets/logo2.png);
        box-shadow:0 0 0 1px rgba(255,255,255,.08), 0 8px 30px rgba(56,189,248,.25)
    }
    .nav-links{display:flex;gap:10px;flex-wrap:wrap}
    .nav-links a{padding:8px 12px;border-radius:10px;color:#e5e7eb}
    .nav-links a:hover{background:rgba(148,163,184,.12)}
    .cta{background:linear-gradient(180deg,#22c55e,#10b981);color:white;padding:10px 14px;border:none;border-radius:10px;font-weight:700;box-shadow:0 8px 20px rgba(16,185,129,.35)}
    .cta:hover{filter:brightness(1.05)}
    .hero{padding:40px 0 20px;display:grid;grid-template-columns:1.1fr;gap:20px}
    .hero h1{font-size:clamp(28px,4.5vw,42px);margin:0 0 8px;line-height:1.1}
    .badge{display:inline-flex;gap:8px;align-items:center;background:rgba(34,197,94,.12);color:#d1fae5;border:1px solid rgba(16,185,129,.35);padding:6px 10px;border-radius:999px;font-size:14px}
    .grid{display:grid;gap:18px}
    .two{grid-template-columns:1fr 1fr}
    .card{background:radial-gradient(1200px 400px at -10% -10%, rgba(56,189,248,.08), transparent 40%), linear-gradient(180deg, rgba(255,255,255,.04), rgba(255,255,255,.01));border:1px solid rgba(148,163,184,.15);border-radius:16px;padding:18px}
    .card h3{margin:0 0 6px;font-size:20px}
    .muted{color:var(--muted)}
    .services-list{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:14px;margin-top:10px}
    .service{border:1px solid rgba(148,163,184,.12);background:linear-gradient(180deg,rgba(2,6,23,.25),rgba(2,6,23,.6));border-radius:14px;padding:14px}
    .tag{display:inline-block;margin-top:8px;background:rgba(56,189,248,.12);color:#e0f2fe;border:1px solid rgba(56,189,248,.35);padding:4px 8px;border-radius:999px;font-size:12px}
    .pill{display:inline-block;background:rgba(34,197,94,.12);color:#bbf7d0;border:1px solid rgba(142, 230, 174, 0.35);padding:3px 8px;border-radius:999px;font-size:12px;margin-left:8px}
    .notice{border-left:4px solid var(--brand);padding:10px 12px;background:rgba(2,6,23,.5);border-radius:8px}
    .gallery{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px}
    .img-card{position:relative;aspect-ratio:4/3;border-radius:14px;overflow:hidden;border:1px solid rgba(148,163,184,.12);background:
      radial-gradient(120px 60px at 20% 20%, rgba(34,197,94,.35), transparent 70%),
      radial-gradient(140px 70px at 80% 30%, rgba(56,189,248,.35), transparent 70%),
      linear-gradient(135deg, rgba(2,6,23,.9), rgba(15,23,42,.9));
      display:flex;align-items:center;justify-content:center;color:#e2e8f0;font-weight:700;text-align:center;padding:10px}
    .img-card small{display:block;font-weight:500;color:#cbd5e1}
    form{display:grid;gap:12px}
    label{font-weight:600;font-size:14px}
    input,select,textarea{width:100%;padding:10px 12px;border-radius:10px;border:1px solid rgba(148,163,184,.25);background:rgba(2,6,23,.5);color:var(--text);outline:none}
    input:focus,select:focus,textarea:focus{box-shadow:var(--ring);border-color:var(--accent)}
    .row{display:grid;gap:12px;grid-template-columns:1fr}
    .submit{background:linear-gradient(180deg,#22c55e,#16a34a);color:white;border:none;padding:12px 14px;border-radius:12px;font-weight:800;cursor:pointer}
    .submit:hover{filter:brightness(1.06)}
    .prices{display:grid;grid-template-columns:1fr;gap:12px}
    .price-item{display:flex;justify-content:space-between;gap:10px;align-items:center;border:1px solid rgba(148,163,184,.15);border-radius:12px;padding:12px;background:linear-gradient(180deg,rgba(2,6,23,.35),rgba(2,6,23,.65))}
    footer{margin-top:40px;border-top:1px solid rgba(148,163,184,.15);background:rgba(2,6,23,.6)}
    .foot{display:grid;gap:10px;padding:16px 0}
    .contact-list{display:grid;gap:6px}
    .copy{color:#94a3b8;font-size:14px}
    /* Responsive */
    @media (min-width:720px){
      .hero{grid-template-columns:1.2fr .8fr;align-items:center}
      .row.two{grid-template-columns:1fr 1fr}
      .row.three{grid-template-columns:repeat(3,1fr)}
      .prices{grid-template-columns:repeat(2,1fr)}
    }
    /* Simple toast */
    .toast{position:fixed;left:50%;transform:translateX(-50%);bottom:16px;background:rgba(2,6,23,.9);border:1px solid rgba(148,163,184,.25);color:#e5e7eb;padding:12px 14px;border-radius:10px;box-shadow:0 10px 30px rgba(0,0,0,.35);opacity:0;pointer-events:none;transition:opacity .3s, transform .3s}
    .toast.show{opacity:1;pointer-events:auto;transform:translateX(-50%) translateY(-6px)}
    .error{color:#fecaca}
  </style>
</head>
<body>
  <header>
    <div class="container nav">
      <div class="brand">
        <div class="logo" aria-hidden="true"></div>
        <div>
          <div>SUNGI MBEMBA BUSINESS</div>
          <small class="muted">Soins à domicile — Kinshasa uniquement</small>
        </div>
      </div>
      <nav class="nav-links" aria-label="Navigation principale">
        <a href="#accueil">Accueil</a>
        <a href="#services">Services</a>
        <a href="#prix">Tarifs</a>
        <a href="#equipe">Nos équipes</a>
        <a href="#reservation" class="cta">Demande de consultation</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Hero -->
    <section id="accueil" class="hero">
      <div>
        <span class="badge">Disponible uniquement à Kinshasa</span>
        <h1>Kinésithérapie, Soins infirmiers, Massage et Prise en charge des personnes âgées</h1>
        <p class="muted">Des professionnels de santé qualifiés pour vous accompagner avec compassion à domicile.</p>
        <div class="notice" style="margin-top:10px">
          Nous intervenons 7j/7 sur rendez-vous. <br> Avant de débuter vos séances, une consultation est obligatoire afin d'établir le traitement adéquat pour vous <br>
          Fixé à 10 $ 
        </div>
      </div>
      <div class="grid">
        <div class="card">
          <h3>Pourquoi nous choisir ?</h3>
          <ul class="muted">
            <li>Équipe pluridisciplinaire expérimentée</li>
            <li>Suivi personnalisé et objectifs mesurables</li>
            <li>Interventions à domicile dans la ville de Kinshasa</li>
          </ul>
        </div>
        <div class="card">
          <h3>Zones couvertes</h3>
          <p class="muted">Toutes les communes de Kinshasa. Appelez pour confirmer la disponibilité dans votre quartier.</p>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section id="services" class="card" style="margin-top:16px">
      <h2>Nos services</h2>
      <p class="muted">Chaque prestation est réalisée par des professionnels avec un plan de soins adapté.</p>
      <div class="services-list">
        <div class="service">
          <strong>Kinésithérapie</strong>
          <p class="muted">Rééducation fonctionnelle, douleurs musculo-squelettiques, post-opératoire, respiratoire, neurologique. Bilan initial et programme progressif.</p>
         
        </div>
        <div class="service">
          <strong>Soins infirmiers</strong>
          <p class="muted">Injections, pansements, perfusions, suivi glycémie/TA, éducation thérapeutique, soins post-opératoires à domicile.</p>
          
        </div>
        <div class="service">
          <strong>Massage</strong>
          <p class="muted">Relaxation, décontracturant, sportif, drainage léger. Hygiène stricte et huiles adaptées.</p>
          
        </div>
        <div class="service">
          <strong>Prise en charge des personnes âgées</strong>
          <p class="muted">Accompagnement global: aide à la mobilité, prévention des chutes, surveillance, stimulation cognitive, coordination avec la famille.</p>
          <span class="pill">Forfaits</span>
        </div>
      </div>
    </section>

    <!-- Tarifs -->
    <section id="prix" class="card" style="margin-top:16px">
      <h2>Tarifs</h2>
      <div class="prices">
        <div class="price-item"><span>Kinésithérapie</span><strong>30 $ / séance</strong></div>
        <div class="price-item"><span>Soins infirmiers</span><strong>15 $ à 500 $</strong></div>
        <div class="price-item"><span>Massage</span><strong>25 $ / séance</strong></div>
        <div class="price-item"><span>Prise en charge des personnes âgées</span><strong>500 $ à 5 000 $</strong></div>
      </div>
      <p class="muted" style="margin-top:8px">Des frais de déplacement peuvent s’appliquer selon le quartier à Kinshasa.</p>
    </section>

    <!-- Équipe -->
    <section id="equipe" class="card" style="margin-top:16px">
      <h2>Nos équipes</h2>
      <!-- <div class="gallery" id="gallery">
         Images médicales générées par canvas 
      </div>-->
      <div class="grid" style="margin-top:14px">
        <div class="service">
          <strong>Équipe Kinésithérapie</strong>
          <p class="muted">Kinésithérapeutes spécialisés en traumatologie, neurologie et pédiatrie. Utilisation de techniques manuelles et exercices fonctionnels.</p>
        </div>
        <div class="service">
          <strong>Équipe Soins infirmiers</strong>
          <p class="muted">Infirmiers(ères) expérimenté(e)s pour soins techniques, suivi des pathologies chroniques et éducation à la santé.</p>
        </div>
        <div class="service">
          <strong>Équipe Massage</strong>
          <p class="muted">Praticiens formés en massage relaxant et sportif, avec protocole d’hygiène strict et adaptation à votre condition.</p>
        </div>
        <div class="service">
          <strong>Équipe Aînés</strong>
          <p class="muted">Auxiliaires et infirmiers dédiés à l’autonomie, nutrition, prévention des escarres et coordination avec la famille.</p>
        </div>
      </div>
    
    </section>

    <!-- Réservation -->
    <section id="reservation" class="card" style="margin-top:16px">
      <h2>Demande de consultation</h2>
      <p class="muted">Veuillez remplir le formulaire ci-dessous. Un membre de notre équipe vous contactera pour confirmer le rendez-vous.</p>
      <form id="bookingForm" novalidate method="post" action="api_submit.php">
        <div class="row two">
          <div>
            <label for="nomComplet">Nom, Postnom et Prénom du patient</label>
            <input type="text" id="nomComplet" name="nomComplet" placeholder="Ex: Smith John Doe" required />
            <small class="error" id="err_nomComplet"></small>
          </div>
          <div>
            <label for="genre">Genre</label>
            <select id="genre" name="genre" required>
              <option value="">Sélectionner...</option>
              <option>Masculin</option>
              <option>Féminin</option>
              <option>Autre / Préfère ne pas dire</option>
            </select>
            <small class="error" id="err_genre"></small>
          </div>
        </div>

        <div class="row three">
          <div>
            <label for="naissanceDate">Date de naissance</label>
            <input type="date" id="naissanceDate" name="naissanceDate" required />
            <small class="error" id="err_naissanceDate"></small>
          </div>
          <div>
            <label for="naissanceLieu">Lieu de naissance</label>
            <input type="text" id="naissanceLieu" name="naissanceLieu" placeholder="Ville / Hôpital" required />
            <small class="error" id="err_naissanceLieu"></small>
          </div>
          <div>
            <label for="telephone">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" inputmode="tel" placeholder="Ex: 0830000000" required />
            <small class="error" id="err_telephone"></small>
          </div>
        </div>

        <div class="row two">
          <div>
            <label for="adresse">Adresse du domicile</label>
            <input type="text" id="adresse" name="adresse" placeholder="Quartier, Avenue, N°, Commune" required />
            <small class="error" id="err_adresse"></small>
          </div>
          <div>
            <label for="service">Service</label>
            <select id="service" name="service" required>
              <option value="">Sélectionner...</option>
              <option value="Kinesitherapie">Kinésithérapie</option>
              <option value="Soins">Soins infirmiers</option>
              <option value="Massage">Massage</option>
              <option value="Aines">Prise en charge des personnes âgées</option>
            </select>
            <small class="error" id="err_service"></small>
          </div>
        </div>

        <div class="row two">
          <div>
            <label for="seances">Nombre de séances</label>
            <select id="seances" name="seances" required>
              <option value="">Sélectionner...</option>
              <option>5</option><option>10</option><option>15</option><option>20</option>
              <option>25</option><option>30</option><option>40</option><option>50</option>
            </select>
            <small class="error" id="err_seances"></small>
          </div>
          <div>
            <label for="paiement">Mode de paiement</label>
            <select id="paiement" name="paiement" required>
              <option value="">Sélectionner...</option>
              <option>Airtel Money</option>
              <option>MPesa</option>
              <option>EquityBCDC</option>
            </select>
            <small class="error" id="err_paiement"></small>
          </div>
        </div>

        <div>
          <label for="details">Informations complémentaires (optionnel)</label>
          <textarea id="details" name="details" rows="3" placeholder="Allergies, disponibilités, médecin traitant, etc."></textarea>
        </div>

        <button type="submit" class="submit">Valider</button>
      </form>
      <p class="muted" style="margin-top:10px">En validant, vous acceptez d’être contacté par téléphone ou email pour la confirmation du rendez-vous.</p>
    </section>
  </main>

  <footer>
    <div class="container foot">
      <div class="contact-list">
        <strong>Contact</strong>
        <span>Téléphone: +243 830676252 / 819816892</span>
        <span>Email: <a href="mailto:sungimbemba.business.drc@gmail.com">sungimbemba.business.drc@gmail.com</a></span>
      </div>
      <div class="copy">© <span id="year"></span> SUNGI MBEMBA BUSINESS. Tous droits réservés.</div>
      <small>By <a href="https://portfoliome.42web.io/">4ZEFLOWERS</a></small>
    </div>
  </footer>

  <div id="toast" class="toast" role="status" aria-live="polite"></div>

  <script>
    // Remplir l'année
    document.getElementById('year').textContent = new Date().getFullYear();

    // Générer des "images" de l'équipe via Canvas (sans utiliser d’URL externe)
    const gallery = document.getElementById('gallery');
    const roles = [
      { title: "Kinésithérapeute", accent: "#22c55e" },
      { title: "Infirmier(ère)", accent: "#38bdf8" },
      { title: "Masseur(se)", accent: "#f59e0b" },
      { title: "Auxiliaire gériatrique", accent: "#a78bfa" },
      { title: "Superviseur clinique", accent: "#ef4444" },
      { title: "Coordinateur(trice)", accent: "#10b981" }
    ];

    function makeStaffCanvas(title, accent){
      const c = document.createElement('canvas');
      c.width = 800; c.height = 600;
      const ctx = c.getContext('3d');

      // Background gradient
      const g = ctx.createLinearGradient(0,0,800,600);
      g.addColorStop(0, "#0b1220");
      g.addColorStop(1, "#0f172a");
      ctx.fillStyle = g;
      ctx.fillRect(0,0,800,600);

      // Abstract stethoscope-like shape
      ctx.strokeStyle = accent;
      ctx.lineWidth = 10;
      ctx.beginPath();
      ctx.arc(300,240,110,Math.PI*0.9,Math.PI*1.9);
      ctx.moveTo(410,240);
      ctx.bezierCurveTo(520,220,540,370,460,390);
      ctx.stroke();

      // Cross/medical symbol
      ctx.fillStyle = accent + "cc";
      const cx=600, cy=160, s=26;
      ctx.fillRect(cx-s,cy-3*s,2*s,2*s);
      ctx.fillRect(cx-3*s,cy-s,2*s,2*s);
      ctx.fillRect(cx-s,cy-s,2*s,2*s);
      ctx.fillRect(cx-s,cy+s,2*s,2*s);
      ctx.fillRect(cx+s,cy-s,2*s,2*s);

      // Text
      ctx.fillStyle = "#e5e7eb";
      ctx.font = "bold 36px system-ui, Segoe UI, Arial";
      ctx.fillText("SUNGI MBEMBA BUSINESS", 40, 520);
      ctx.font = "28px system-ui, Segoe UI, Arial";
      ctx.fillStyle = "#cbd5e1";
      ctx.fillText(title, 40, 560);

      return c.toDataURL("image/png");
    }

    roles.forEach(r=>{
      const url = makeStaffCanvas(r.title, r.accent);
      const fig = document.createElement('div');
      fig.className = 'img-card';
      fig.style.backgroundImage = `url(${url})`;
      fig.style.backgroundSize = 'cover';
      fig.style.backgroundPosition = 'center';
      fig.innerHTML = '';
      gallery.appendChild(fig);
    });

    // Form validation and submission
    const form = document.getElementById('bookingForm');
    const toast = document.getElementById('toast');

    function showToast(msg, ok=true){
      toast.textContent = msg;
      toast.style.borderColor = ok ? 'rgba(34,197,94,.45)' : 'rgba(239,68,68,.45)';
      toast.classList.add('show');
      setTimeout(()=>toast.classList.remove('show'), 3500);
    }

   form.addEventListener('submit', e => {
  e.preventDefault();
  ['nomComplet','genre','naissanceDate','naissanceLieu','telephone','adresse','service','seances','paiement'].forEach(id=>{
    const el = document.getElementById('err_'+id);
    if(el) el.textContent = '';
  });

  const data = {
    nomComplet: form.nomComplet.value.trim(),
    genre: form.genre.value,
    naissanceDate: form.naissanceDate.value,
    naissanceLieu: form.naissanceLieu.value.trim(),
    telephone: form.telephone.value.trim(),
    adresse: form.adresse.value.trim(),
    service: form.service.value,
    seances: form.seances.value,
    paiement: form.paiement.value,
    details: form.details.value.trim()
  };


      // Basic validation
      let ok = true;
  function setErr(id, msg){ const el = document.getElementById('err_'+id); if(el){ el.textContent = msg; ok = false; } }
  if(!data.nomComplet) setErr('nomComplet','Veuillez saisir le nom complet.');
  if(!data.genre) setErr('genre','Veuillez sélectionner le genre.');
  if(!data.naissanceDate) setErr('naissanceDate','Date de naissance requise.');
  if(!data.naissanceLieu) setErr('naissanceLieu','Lieu de naissance requis.');
  if(!/^[0-9+\s]{8,}$/.test(data.telephone)) setErr('telephone','Numéro de téléphone invalide.');
  if(!data.adresse) setErr('adresse','Adresse requise.');
  if(!data.service) setErr('service','Sélectionnez un service.');
  if(!data.seances) setErr('seances','Sélectionnez le nombre de séances.');
  if(!data.paiement) setErr('paiement','Sélectionnez un mode de paiement.');
  if(!ok){ showToast('Veuillez corriger les champs en rouge.', false); return; }

      

      // Here you could send data to a backend endpoint with fetch(...)
      // ENVOI VERS L’API
  fetch('/smbusiness/api_submit.php', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify(data)
  })
  .then(r => r.json())
  .then(res => {
    if(!res.ok){
      showToast(res.message || 'Erreur serveur', false);
      console.error('API error:', res);
      return;
    }
    showToast('Demande enregistrée (#'+res.data.id+'). Merci !');
    form.reset();
  })
  .catch(err => {
    console.error(err);
    showToast('Erreur réseau, réessayez.', false);
  });
     
      // For the demo, we just show a confirmation and compose an email body.
const summary = `
Nouvelle demande de consultation:
- Patient: ${data.nomComplet}
- Genre: ${data.genre}
- Naissance: ${data.naissanceDate} à ${data.naissanceLieu}
- Téléphone: ${data.telephone}
- Adresse: ${data.adresse}
- Service: ${data.service}
- Séances: ${data.seances}
- Paiement: ${data.paiement}
- Détails: ${data.details || '—'}
      `.trim();

      console.log(summary);

      // Prepare mailto link for quick send
      const subject = encodeURIComponent('Demande de consultation — ' + data.service);
      const body = encodeURIComponent(summary + '\n\nEnvoyé via le site web.');
      const mailto = `mailto:sungimbemba.business.drc@gmail.com?subject=${subject}&body=${body}`;

      showToast('Demande enregistrée. Nous vous contacterons sous peu.');
      form.reset();

      // Offer to open email client
      setTimeout(()=>{
        if(confirm('Souhaitez-vous envoyer votre demande par email maintenant ?')){
          window.location.href = mailto;
        }
      }, 500);
    });
  </script>
</body>
</html>