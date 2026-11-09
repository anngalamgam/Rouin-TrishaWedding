<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wedding Invitation | Together Forever</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root{
        --ivory:#FDFBF7;
        --gold:#D4AF37;
        --gold-light:#E8CE7B;
        --blush:#F8E8E8;
        --white:#FFFFFF;
        --sage:#9CAF88;
        --sage-dark:#7C8F68;
        --text-dark:#4A3F35;
    }

    *{ box-sizing: border-box; }

    html{ scroll-behavior: smooth; }

    body{
        margin:0;
        min-height:100vh;
        font-family:'Poppins', sans-serif;
        color:var(--text-dark);
        background:var(--ivory);
        background-image:
            radial-gradient(circle at 20% 20%, rgba(212,175,55,0.06) 0%, transparent 40%),
            radial-gradient(circle at 80% 80%, rgba(156,175,136,0.08) 0%, transparent 40%),
            radial-gradient(circle at 50% 50%, rgba(248,232,232,0.4) 0%, transparent 60%);
        overflow-x:hidden;
        position:relative;
    }

    .font-script{ font-family:'Great Vibes', cursive; }
    .font-heading{ font-family:'Playfair Display', serif; }

    /* subtle paper texture overlay */
    body::before{
        content:"";
        position:fixed;
        inset:0;
        background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.02'/%3E%3C/svg%3E");
        pointer-events:none;
        z-index:0;
    }

    /* ================= FLOATING PETALS ================= */
    .petals-container{
        position:fixed;
        inset:0;
        pointer-events:none;
        z-index:5;
        overflow:hidden;
    }
    .petal{
        position:absolute;
        top:-10%;
        border-radius:150% 0 150% 0;
        opacity:0.75;
        animation:fall linear infinite;
    }
    @keyframes fall{
        0%{ transform: translateY(-10vh) translateX(0) rotate(0deg); opacity:0.9;}
        100%{ transform: translateY(110vh) translateX(40px) rotate(360deg); opacity:0.2;}
    }

    /* ================= ENVELOPE SCENE ================= */
    #envelope-scene{
        min-height:100vh;
        min-height:100dvh;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        position:relative;
        padding:20px;
        z-index:2;
        transition:opacity 1s ease, visibility 1s ease;
    }
    #envelope-scene.hidden-scene{
        opacity:0;
        visibility:hidden;
        position:fixed;
        pointer-events:none;
    }

    .invite-heading{
        text-align:center;
        margin-bottom:35px;
        z-index:3;
        position:relative;
    }
    .invite-heading h1{
        font-family:'Playfair Display', serif;
        font-weight:600;
        font-size:clamp(1.7rem, 6vw, 2.4rem);
        color:var(--gold);
        letter-spacing:2px;
        text-shadow: 0 2px 15px rgba(212,175,55,0.35);
        margin-bottom:8px;
        animation: fadeDown 1.4s ease both;
    }
    .invite-heading p{
        font-family:'Poppins',sans-serif;
        font-weight:300;
        letter-spacing:2px;
        text-transform:uppercase;
        font-size:clamp(0.68rem, 2.5vw, 0.8rem);
        color:var(--text-dark);
        opacity:0.75;
        animation: fadeDown 1.6s ease both;
    }

    @keyframes fadeDown{
        from{ opacity:0; transform:translateY(-20px);}
        to{ opacity:1; transform:translateY(0);}
    }

    /* Couple photo frame (replaces floral corner decorations) */
    .couple-photo-frame{
        position:relative;
        width:220px;
        height:220px;
        margin:0 auto 24px;
        z-index:3;
        animation: fadeDown 1.2s ease both, floatSlow 5s ease-in-out infinite 1.2s;
    }
    @keyframes floatSlow{
        0%,100%{ transform: translateY(0);}
        50%{ transform: translateY(-8px);}
    }
    .couple-photo-frame::before{
        content:"";
        position:absolute;
        inset:-10px;
        border-radius:50%;
        background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--gold-light));
        z-index:0;
    }
    .couple-photo-frame::after{
        content:"";
        position:absolute;
        inset:-20px;
        border-radius:50%;
        border:1px solid rgba(212,175,55,0.5);
        z-index:0;
    }
    .couple-photo-frame img{
        position:relative;
        z-index:1;
        width:100%;
        height:100%;
        object-fit:cover;
        border-radius:50%;
        border:5px solid var(--ivory);
        box-shadow: 0 18px 40px rgba(120,90,40,0.32);
        display:block;
        cursor:pointer;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .couple-photo-frame{ cursor:pointer; }
    .couple-photo-frame:hover img{
        transform: scale(1.04);
        box-shadow: 0 22px 46px rgba(120,90,40,0.42);
    }
    .couple-photo-hint{
        text-align:center;
        font-size:0.68rem;
        letter-spacing:1px;
        text-transform:uppercase;
        color:var(--gold);
        opacity:0.75;
        margin-top:8px;
        margin-bottom:16px;
        animation: blinkHint 2.2s ease-in-out infinite;
    }

    /* soft ambient glows kept behind the scene instead of corner florals */
    .ambient-glow{
        position:absolute;
        pointer-events:none;
        z-index:0;
        border-radius:50%;
        filter:blur(60px);
        opacity:0.5;
    }
    .glow-tl{ top:-5%; left:-8%; width:260px; height:260px; background:var(--blush);}
    .glow-br{ bottom:-5%; right:-8%; width:260px; height:260px; background:rgba(156,175,136,0.35);}

    @media (max-width:576px){
        .couple-photo-frame{ width:170px; height:170px; }
    }
    /* real phone devices (detected via JS, not just narrow browser windows) */
    html.is-mobile-device .couple-photo-frame{ width:150px; height:150px; margin-bottom:18px; }

    /* ============ SCATTERED BACKGROUND PHOTO GALLERY ============ */
    .bg-gallery{
        position:absolute;
        inset:0;
        z-index:1;
        pointer-events:none;
        overflow:hidden;
    }
    .bg-photo{
        position:absolute;
        background:#fff;
        padding:10px 10px 26px;
        border-radius:5px;
        box-shadow: 0 22px 38px rgba(90,70,40,0.2), 0 6px 14px rgba(0,0,0,0.07);
        opacity:0.88;
        animation: sway 7s ease-in-out infinite;
    }
    .bg-photo img{
        display:block;
        width:100%;
        height:100%;
        object-fit:cover;
        border-radius:2px;
        filter: saturate(0.85) sepia(0.08);
    }
    @keyframes sway{
        0%,100%{ transform: var(--rot) translateY(0);}
        50%{ transform: var(--rot) translateY(-10px);}
    }

    /* bigger, more prominent placement on desktop/tablet */
    .bg-photo-1{ --rot:rotate(-9deg); top:5%;  left:3%;  width:170px; height:200px; animation-delay:0s; }
    .bg-photo-2{ --rot:rotate(7deg);  top:10%; right:3%; width:155px; height:184px; animation-delay:1.1s; }
    .bg-photo-3{ --rot:rotate(6deg);  bottom:7%; left:4%; width:148px; height:176px; animation-delay:2.2s; }
    .bg-photo-4{ --rot:rotate(-6deg); bottom:5%; right:5%; width:172px; height:202px; animation-delay:0.6s; }
    .bg-photo-5{ --rot:rotate(-4deg); top:38%; left:0.5%; width:132px; height:156px; animation-delay:1.7s; }
    .bg-photo-6{ --rot:rotate(10deg); top:44%; right:0.5%; width:132px; height:156px; animation-delay:2.6s; }

    /* Progressively shrink and tuck all six photos closer to the edges
       as the screen narrows - none are ever hidden, they just get smaller
       so they stay out of the way of the envelope and headline in the center. */
    @media (max-width:1100px){
        .bg-photo-1{ width:140px; height:164px; }
        .bg-photo-2{ width:128px; height:152px; }
        .bg-photo-3{ width:122px; height:146px; }
        .bg-photo-4{ width:142px; height:166px; }
        .bg-photo-5{ width:106px; height:126px; top:36%; }
        .bg-photo-6{ width:106px; height:126px; top:42%; }
    }
    @media (max-width:900px){
        .bg-photo-1{ width:112px; height:132px; top:4%; left:1.5%; }
        .bg-photo-2{ width:104px; height:124px; top:8%; right:1.5%; }
        .bg-photo-3{ width:98px; height:118px; bottom:6%; left:2%; }
        .bg-photo-4{ width:114px; height:134px; bottom:4%; right:2%; }
        .bg-photo-5{ width:88px; height:106px; top:34%; left:0.5%; }
        .bg-photo-6{ width:88px; height:106px; top:40%; right:0.5%; }
    }
    @media (max-width:700px){
        .bg-photo{ opacity:0.78; padding:8px 8px 20px; }
        .bg-photo-1{ width:120px; height:142px; top:2%; left:0; }
        .bg-photo-2{ width:112px; height:134px; top:5%; right:0; }
        .bg-photo-3{ width:104px; height:124px; bottom:22%; left:0; }
        .bg-photo-4{ width:122px; height:144px; bottom:2%; right:0; }
        .bg-photo-5{ width:96px; height:114px; top:31%; left:0; }
        .bg-photo-6{ width:96px; height:114px; top:37%; right:0; }
    }
    @media (max-width:460px){
        .bg-photo{ opacity:0.68; padding:7px 7px 17px; }
        .bg-photo-1{ width:100px; height:120px; top:1.5%; left:0; }
        .bg-photo-2{ width:94px; height:114px; top:4%; right:0; }
        .bg-photo-3{ width:88px; height:106px; bottom:24%; left:0; }
        .bg-photo-4{ width:102px; height:122px; bottom:1.5%; right:0; }
        .bg-photo-5{ width:78px; height:94px; top:29%; left:0; }
        .bg-photo-6{ width:78px; height:94px; top:35%; right:0; }
    }
    @media (max-width:360px){
        .bg-photo-1{ width:86px; height:104px; }
        .bg-photo-2{ width:82px; height:100px; }
        .bg-photo-3{ width:76px; height:92px; }
        .bg-photo-4{ width:88px; height:106px; }
        .bg-photo-5{ width:66px; height:80px; }
        .bg-photo-6{ width:66px; height:80px; }
    }

    /* ================= ENVELOPE ================= */
    .envelope-wrap{
        perspective:1800px;
        z-index:3;
        position:relative;
    }

    .envelope{
        width:340px;
        max-width:88vw;
        height:230px;
        position:relative;
        cursor:pointer;
        filter: drop-shadow(0 25px 35px rgba(120,90,40,0.28));
        transition: transform 0.4s ease;
    }
    .envelope:hover{ transform: translateY(-6px); }

    .envelope-body{
        position:absolute;
        inset:0;
        background: linear-gradient(135deg, #FFFDF9 0%, #FBF3E3 60%, #F5E9D0 100%);
        border:2px solid var(--gold);
        border-radius:10px;
        box-shadow: inset 0 0 40px rgba(212,175,55,0.08);
        overflow:hidden;
    }
    .envelope-body::before{
        content:"";
        position:absolute;
        inset:0;
        background-image: repeating-linear-gradient(45deg, rgba(212,175,55,0.03) 0, rgba(212,175,55,0.03) 2px, transparent 2px, transparent 8px);
    }

    /* triangular flap (back, always visible) */
    .flap-back{
        position:absolute;
        top:0; left:0; right:0;
        height:0; width:0;
        border-left: 170px solid transparent;
        border-right: 170px solid transparent;
        border-top: 115px solid #F3E4C6;
        z-index:1;
    }

    /* the top flap that opens */
    .flap-top{
        position:absolute;
        top:0; left:0; right:0;
        height:0; width:0;
        margin:0 auto;
        border-left: 170px solid transparent;
        border-right: 170px solid transparent;
        border-top: 115px solid;
        border-top-color:#FBF0D9;
        transform-origin: top center;
        transition: transform 1.1s cubic-bezier(.65,0,.35,1);
        z-index:4;
        filter: drop-shadow(0 4px 6px rgba(120,90,30,0.15));
    }
    .flap-top::after{
        content:"";
        position:absolute;
        top:-115px; left:-170px;
        width:340px; height:115px;
        background-image: linear-gradient(115deg, transparent 48%, rgba(212,175,55,0.35) 49%, rgba(212,175,55,0.35) 50.5%, transparent 51.5%);
    }

    .envelope.open .flap-top{
        transform: rotateX(180deg);
        z-index:1;
    }

    /* ribbon */
    .ribbon-v{
        position:absolute;
        top:0; bottom:0; left:50%;
        width:26px;
        transform:translateX(-50%);
        background: linear-gradient(90deg, var(--sage-dark), var(--sage) 50%, var(--sage-dark));
        z-index:3;
        box-shadow: 0 0 8px rgba(0,0,0,0.15);
    }

    /* wax seal */
    .wax-seal{
        position:absolute;
        top:50%; left:50%;
        transform:translate(-50%,-50%);
        width:64px; height:64px;
        border-radius:50%;
        background: radial-gradient(circle at 35% 30%, #C43B3B, #8C1F1F 70%);
        box-shadow: 0 6px 14px rgba(90,10,10,0.45), inset 0 -4px 6px rgba(0,0,0,0.3), inset 0 3px 6px rgba(255,255,255,0.25);
        display:flex;
        align-items:center;
        justify-content:center;
        z-index:6;
        cursor:pointer;
        animation: pulseSeal 2.4s ease-in-out infinite;
        transition: transform 0.35s ease;
    }
    .wax-seal:hover{ transform: translate(-50%,-50%) scale(1.08); }
    .wax-seal i{
        color:#F3D9A4;
        font-size:1.5rem;
        text-shadow:0 1px 2px rgba(0,0,0,0.4);
    }
    @keyframes pulseSeal{
        0%,100%{ box-shadow: 0 6px 14px rgba(90,10,10,0.45), inset 0 -4px 6px rgba(0,0,0,0.3), inset 0 3px 6px rgba(255,255,255,0.25), 0 0 0 0 rgba(196,59,59,0.5);}
        50%{ box-shadow: 0 6px 14px rgba(90,10,10,0.45), inset 0 -4px 6px rgba(0,0,0,0.3), inset 0 3px 6px rgba(255,255,255,0.25), 0 0 0 12px rgba(196,59,59,0);}
    }

    .envelope.open .wax-seal{
        animation:none;
        opacity:0;
        transform:translate(-50%,-50%) scale(0.4) rotateX(180deg);
        transition: all 0.6s ease;
    }

    /* peek of card inside envelope */
    .card-peek{
        position:absolute;
        left:8%; right:8%;
        bottom:8px;
        top:35px;
        background: var(--white);
        border-radius:6px 6px 0 0;
        border:1px solid #eee0c0;
        z-index:2;
        transition: transform 1s cubic-bezier(.65,0,.35,1) 0.3s;
    }
    .envelope.open .card-peek{
        transform: translateY(-70px);
    }

    .tap-hint{
        position:absolute;
        bottom:-38px;
        left:0; right:0;
        text-align:center;
        font-size:0.75rem;
        letter-spacing:1px;
        color:var(--gold);
        opacity:0.85;
        animation: blinkHint 1.8s ease-in-out infinite;
    }
    @keyframes blinkHint{
        0%,100%{ opacity:0.4;} 50%{ opacity:1;}
    }

    /* ===== Envelope responsive scaling =====
       Border-triangle shapes don't scale with percentages, so we
       redefine the exact pixel geometry at each breakpoint to keep
       the flap, ribbon and seal proportioned to the smaller envelope. */
    @media (max-width:576px){
        .envelope{ width:280px; height:190px; }
        .flap-back, .flap-top{
            border-left-width:140px;
            border-right-width:140px;
            border-top-width:95px;
        }
        .flap-top::after{ top:-95px; left:-140px; width:280px; height:95px; }
        .wax-seal{ width:54px; height:54px; }
        .wax-seal i{ font-size:1.25rem; }
        .ribbon-v{ width:22px; }
        .card-peek{ top:30px; }
        .envelope.open .card-peek{ transform: translateY(-58px); }
    }
    @media (max-width:400px){
        .envelope{ width:250px; height:170px; }
        .flap-back, .flap-top{
            border-left-width:125px;
            border-right-width:125px;
            border-top-width:85px;
        }
        .flap-top::after{ top:-85px; left:-125px; width:250px; height:85px; }
        .wax-seal{ width:48px; height:48px; }
        .wax-seal i{ font-size:1.1rem; }
        .ribbon-v{ width:18px; }
        .card-peek{ top:26px; }
        .envelope.open .card-peek{ transform: translateY(-50px); }
    }
    @media (max-width:340px){
        .envelope{ width:220px; height:150px; }
        .flap-back, .flap-top{
            border-left-width:110px;
            border-right-width:110px;
            border-top-width:75px;
        }
        .flap-top::after{ top:-75px; left:-110px; width:220px; height:75px; }
        .wax-seal{ width:44px; height:44px; }
        .wax-seal i{ font-size:1rem; }
    }

    /* ================= INVITATION SECTION ================= */
    #invitation-scene{
        display:none;
        min-height:100vh;
        min-height:100dvh;
        align-items:flex-start;
        justify-content:center;
        padding:60px 15px 80px;
        position:relative;
        z-index:2;
    }
    #invitation-scene.show{
        display:flex;
        animation: fadeIn 1s ease both;
    }
    @keyframes fadeIn{
        from{ opacity:0;} to{ opacity:1;}
    }

    .invitation-card{
        width:100%;
        max-width:640px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFFEFB 100%);
        border-radius:28px;
        position:relative;
        padding:clamp(30px, 6vw, 50px) clamp(18px, 5vw, 35px) clamp(26px, 5vw, 40px);
        box-shadow: 0 30px 60px rgba(120,90,40,0.18), 0 8px 20px rgba(0,0,0,0.06);
        border:1px solid rgba(212,175,55,0.35);
        opacity:0;
        transform: translateY(60px) scale(0.92);
        animation: cardRise 1.2s cubic-bezier(.2,.8,.2,1) forwards;
        animation-delay:0.4s;
    }
    @keyframes cardRise{
        to{ opacity:1; transform: translateY(0) scale(1); }
    }

    /* floral corner borders on the card */
    .invitation-card::before, .invitation-card::after{
        content:"";
        position:absolute;
        width:110px; height:110px;
        background-size:contain;
        background-repeat:no-repeat;
        opacity:0.9;
        pointer-events:none;
    }
    .invitation-card::before{
        top:-18px; left:-18px;
        background-image:url('https://cdn.jsdelivr.net/gh/twitter/twemoji@latest/assets/svg/1f339.svg');
        transform: rotate(-15deg);
        filter: hue-rotate(300deg) saturate(0.6);
    }
    .invitation-card::after{
        bottom:-18px; right:-18px;
        background-image:url('https://cdn.jsdelivr.net/gh/twitter/twemoji@latest/assets/svg/1f339.svg');
        transform: rotate(165deg);
        filter: hue-rotate(300deg) saturate(0.6);
    }
    @media (max-width:576px){
        .invitation-card::before, .invitation-card::after{ width:70px; height:70px; }
        .invitation-card::before{ top:-10px; left:-10px; }
        .invitation-card::after{ bottom:-10px; right:-10px; }
    }

    .card-inner-border{
        border:1.5px solid var(--gold);
        border-radius:18px;
        padding:clamp(20px, 5vw, 35px) clamp(12px, 4vw, 20px);
        position:relative;
    }

    .families-line{
        text-align:center;
        font-size:0.72rem;
        letter-spacing:2.5px;
        text-transform:uppercase;
        color:var(--sage-dark);
        margin-bottom:18px;
        font-weight:500;
    }

    .couple-names{
        text-align:center;
        margin-bottom:6px;
    }
    .couple-names .name{
        font-family:'Great Vibes', cursive;
        font-size:clamp(2.2rem, 9vw, 3.1rem);
        color:var(--text-dark);
        line-height:1.1;
        display:block;
    }
    .couple-names .amp{
        font-family:'Playfair Display', serif;
        font-style:italic;
        font-size:clamp(1.2rem, 4vw, 1.6rem);
        color:var(--gold);
        display:block;
        margin:2px 0;
    }

    /* ============ GROOM / BRIDE PHOTOS FLANKING THE NAMES ============ */
    .couple-names-row{
        display:flex;
        align-items:center;
        justify-content:center;
        gap:clamp(10px, 4vw, 30px);
        margin-bottom:26px;
    }
    .person-photo{
        flex:0 0 auto;
        width:clamp(70px, 14vw, 110px);
        height:clamp(100px, 20vw, 155px);
        position:relative;
    }
    .person-photo::before{
        content:"";
        position:absolute;
        inset:-6px;
        border-radius:14px;
        background: linear-gradient(135deg, var(--gold-light), var(--gold));
        z-index:0;
    }
    .person-photo img{
        position:relative;
        z-index:1;
        width:100%;
        height:100%;
        object-fit:cover;
        border-radius:10px;
        border:3px solid var(--ivory);
        box-shadow: 0 10px 22px rgba(120,90,40,0.28);
        display:block;
    }
    .person-photo .person-label{
        position:absolute;
        bottom:-22px;
        left:0; right:0;
        text-align:center;
        font-size:0.62rem;
        letter-spacing:1.5px;
        text-transform:uppercase;
        color:var(--sage-dark);
        font-weight:600;
        z-index:1;
    }
    .couple-names-row .couple-names{ margin-bottom:0; }

    @media (max-width:480px){
        .couple-names-row{ gap:8px; }
        .person-photo{ width:58px; height:84px; }
        .person-photo .person-label{ font-size:0.55rem; bottom:-18px; }
    }
    @media (max-width:360px){
        .couple-names-row{ flex-direction:column; gap:14px; }
        .person-photo{ width:90px; height:120px; margin-bottom:6px; }
    }

    .rsvp-invite-text{
        text-align:center;
        font-size:clamp(0.85rem, 2.8vw, 0.95rem);
        color:var(--text-dark);
        opacity:0.85;
        margin:18px auto 25px;
        max-width:420px;
        font-weight:300;
        letter-spacing:0.4px;
    }

    hr.divider{
        border:none;
        height:1px;
        width:70px;
        margin:20px auto;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
    }

    .details-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:16px;
        margin:25px 0 10px;
    }
    @media (max-width:768px){
        .details-grid{ grid-template-columns:repeat(2,1fr); }
    }
    @media (max-width:480px){
        .details-grid{ grid-template-columns:1fr; }
    }
    .detail-box{
        background: var(--blush);
        border-radius:16px;
        padding:20px 12px;
        text-align:center;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        border:1px solid rgba(212,175,55,0.25);
    }
    .detail-box:hover{
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(212,175,55,0.25);
    }
    .detail-box i{
        font-size:1.5rem;
        color:var(--gold);
        margin-bottom:10px;
        display:inline-block;
    }
    .detail-box h6{
        font-family:'Playfair Display', serif;
        font-size:0.95rem;
        margin-bottom:6px;
        color:var(--text-dark);
        font-weight:600;
    }
    .detail-box p{
        font-size:0.82rem;
        margin:0;
        color:var(--text-dark);
        opacity:0.8;
        line-height:1.4;
    }

    .quote-line{
        text-align:center;
        font-family:'Playfair Display', serif;
        font-style:italic;
        color:var(--sage-dark);
        font-size:clamp(0.92rem, 3vw, 1.05rem);
        margin:30px auto 5px;
        max-width:460px;
        line-height:1.6;
    }

    /* ============== RSVP SECTION ============== */
    .rsvp-section{
        margin-top:40px;
        background: rgba(248,232,232,0.5);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        border:1px solid rgba(212,175,55,0.3);
        border-radius:22px;
        padding:clamp(22px, 5vw, 32px) clamp(14px, 4vw, 22px);
        text-align:center;
    }
    .rsvp-section h4{
        font-family:'Playfair Display', serif;
        color:var(--text-dark);
        margin-bottom:22px;
        font-size:clamp(1.15rem, 4vw, 1.4rem);
    }
    .rsvp-section h4 i{ color:var(--gold); margin-right:8px; }

    .form-label-elegant{
        font-size:0.85rem;
        letter-spacing:1px;
        text-transform:uppercase;
        color:var(--sage-dark);
        font-weight:500;
        margin-bottom:8px;
        display:block;
        text-align:left;
    }

    .elegant-input{
        border:1.5px solid rgba(212,175,55,0.5);
        border-radius:14px;
        padding:12px 18px;
        font-family:'Poppins', sans-serif;
        font-size:0.95rem;
        background: rgba(255,255,255,0.85);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        width:100%;
    }
    .elegant-input:focus{
        outline:none;
        border-color:var(--gold);
        box-shadow:0 0 0 4px rgba(212,175,55,0.15);
    }

    .invalid-feedback-elegant{
        color:#B23A48;
        font-size:0.8rem;
        margin-top:6px;
        text-align:left;
    }

    .attendance-options{
        display:flex;
        gap:14px;
        margin-top:22px;
        flex-wrap:wrap;
        justify-content:center;
    }

    .btn-rsvp{
        border:none;
        border-radius:50px;
        padding:14px 26px;
        font-family:'Poppins', sans-serif;
        font-weight:600;
        font-size:0.9rem;
        letter-spacing:0.4px;
        cursor:pointer;
        display:inline-flex;
        align-items:center;
        gap:10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        flex:1 1 200px;
        justify-content:center;
    }
    .btn-yes{
        background: linear-gradient(135deg, var(--sage), var(--sage-dark));
        color:#fff;
        box-shadow: 0 8px 18px rgba(124,143,104,0.35);
    }
    .btn-yes:hover{
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 24px rgba(124,143,104,0.5);
    }
    .btn-no{
        background: linear-gradient(135deg, #d9a3a3, #b56464);
        color:#fff;
        box-shadow: 0 8px 18px rgba(181,100,100,0.3);
    }
    .btn-no:hover{
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 24px rgba(181,100,100,0.45);
    }
    .btn-rsvp input[type="radio"]{
        display:none;
    }
    .btn-rsvp.selected{
        outline:3px solid rgba(212,175,55,0.6);
        outline-offset:2px;
    }

    .btn-submit-rsvp{
        margin-top:24px;
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        border:none;
        color:#fff;
        padding:14px 40px;
        border-radius:50px;
        font-weight:600;
        letter-spacing:1px;
        text-transform:uppercase;
        font-size:0.85rem;
        box-shadow: 0 10px 22px rgba(212,175,55,0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-submit-rsvp:hover{
        transform: translateY(-3px);
        box-shadow: 0 14px 28px rgba(212,175,55,0.55);
    }

    .alert-elegant{
        border-radius:16px;
        border:none;
        font-family:'Poppins', sans-serif;
        font-size:0.95rem;
        padding:16px 20px;
    }
    .alert-success-elegant{
        background: rgba(156,175,136,0.2);
        color: var(--sage-dark);
        border:1px solid rgba(156,175,136,0.5);
    }

    footer.credit{
        text-align:center;
        padding:25px 10px 40px;
        font-size:0.78rem;
        color:var(--text-dark);
        opacity:0.55;
        letter-spacing:0.5px;
    }

    @media (max-width:480px){
        .attendance-options{ flex-direction:column; gap:12px; }
        .btn-rsvp{ flex:1 1 auto; width:100%; padding:13px 20px; font-size:0.85rem; }
        .btn-submit-rsvp{ width:100%; padding:13px 30px; }
        .elegant-input{ padding:11px 15px; font-size:0.9rem; }
    }

    /* Confetti canvas */
    #confetti-canvas{
        position:fixed;
        inset:0;
        pointer-events:none;
        z-index:50;
    }

    /* ============== SUCCESS POPUP MODAL ============== */
    .success-overlay{
        position:fixed;
        inset:0;
        background: rgba(74,63,53,0.45);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        display:none;
        align-items:center;
        justify-content:center;
        z-index:100;
        padding:20px;
        opacity:0;
        transition: opacity 0.4s ease;
    }
    .success-overlay.show{
        display:flex;
        opacity:1;
    }

    .success-modal{
        position:relative;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFFEFB 100%);
        border-radius:26px;
        border:1px solid rgba(212,175,55,0.4);
        padding:44px 34px 36px;
        max-width:380px;
        width:100%;
        text-align:center;
        box-shadow: 0 40px 80px rgba(90,70,40,0.35);
        transform: scale(0.5) translateY(30px);
        opacity:0;
        transition: transform 0.1s ease, opacity 0.1s ease;
    }
    .success-overlay.show .success-modal{
        animation: popBounce 0.65s cubic-bezier(.34,1.56,.64,1) forwards;
    }
    @keyframes popBounce{
        0%{ transform: scale(0.4) translateY(40px); opacity:0; }
        60%{ transform: scale(1.06) translateY(-6px); opacity:1; }
        80%{ transform: scale(0.97) translateY(2px); }
        100%{ transform: scale(1) translateY(0); opacity:1; }
    }

    .success-icon{
        width:78px;
        height:78px;
        margin:0 auto 20px;
        border-radius:50%;
        background: linear-gradient(135deg, var(--sage), var(--sage-dark));
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow: 0 12px 26px rgba(124,143,104,0.45);
        animation: iconPulse 1.8s ease-in-out infinite 0.6s;
    }
    .success-icon i{
        color:#fff;
        font-size:2.1rem;
    }
    @keyframes iconPulse{
        0%,100%{ box-shadow: 0 12px 26px rgba(124,143,104,0.45), 0 0 0 0 rgba(124,143,104,0.4); }
        50%{ box-shadow: 0 12px 26px rgba(124,143,104,0.45), 0 0 0 14px rgba(124,143,104,0); }
    }

    .success-modal h3{
        font-family:'Playfair Display', serif;
        font-size:1.5rem;
        color:var(--text-dark);
        margin-bottom:10px;
    }
    .success-modal p{
        font-size:0.95rem;
        color:var(--text-dark);
        opacity:0.8;
        margin-bottom:26px;
        line-height:1.5;
    }

    .success-close-btn{
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        color:#fff;
        border:none;
        padding:12px 34px;
        border-radius:50px;
        font-weight:600;
        letter-spacing:0.6px;
        font-size:0.85rem;
        text-transform:uppercase;
        box-shadow: 0 10px 22px rgba(212,175,55,0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor:pointer;
    }
    .success-close-btn:hover{
        transform: translateY(-3px);
        box-shadow: 0 14px 28px rgba(212,175,55,0.55);
    }

    .success-modal .success-x{
        position:absolute;
        top:16px; right:18px;
        background:none;
        border:none;
        font-size:1.1rem;
        color:var(--text-dark);
        opacity:0.5;
        cursor:pointer;
        transition: opacity 0.2s ease, transform 0.2s ease;
    }
    .success-modal .success-x:hover{
        opacity:1;
        transform: rotate(90deg);
    }

    @media (max-width:420px){
        .success-modal{ padding:36px 22px 28px; }
        .success-icon{ width:66px; height:66px; }
        .success-icon i{ font-size:1.8rem; }
    }

    /* ============== WEDDING PHOTO GALLERY MODAL ============== */
    .gallery-overlay{
        position:fixed;
        inset:0;
        background: rgba(74,63,53,0.55);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        display:none;
        align-items:center;
        justify-content:center;
        z-index:110;
        padding:20px;
        opacity:0;
        transition: opacity 0.35s ease;
    }
    .gallery-overlay.show{
        display:flex;
        opacity:1;
    }

    .gallery-modal{
        position:relative;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFFEFB 100%);
        border-radius:26px;
        border:1px solid rgba(212,175,55,0.4);
        padding:30px 24px 26px;
        max-width:620px;
        width:100%;
        box-shadow: 0 40px 90px rgba(90,70,40,0.4);
        transform: scale(0.55) translateY(30px);
        opacity:0;
    }
    .gallery-overlay.show .gallery-modal{
        animation: popBounce 0.6s cubic-bezier(.34,1.56,.64,1) forwards;
    }

    .gallery-title{
        text-align:center;
        font-family:'Playfair Display', serif;
        font-size:1.35rem;
        color:var(--text-dark);
        margin-bottom:18px;
    }
    .gallery-title i{ color:var(--gold); margin-right:8px; }

    .gallery-close{
        position:absolute;
        top:16px; right:18px;
        background:none;
        border:none;
        font-size:1.2rem;
        color:var(--text-dark);
        opacity:0.55;
        cursor:pointer;
        transition: opacity 0.2s ease, transform 0.2s ease;
        z-index:2;
    }
    .gallery-close:hover{ opacity:1; transform: rotate(90deg); }

    .gallery-viewer{
        display:flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        margin-bottom:14px;
    }
    .gallery-image-wrap{
        flex:1 1 auto;
        border-radius:16px;
        overflow:hidden;
        background: var(--blush);
        box-shadow: 0 14px 30px rgba(120,90,40,0.22);
        border:1px solid rgba(212,175,55,0.3);
        max-height:56vh;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .gallery-image-wrap img{
        width:100%;
        max-height:56vh;
        object-fit:contain;
        display:block;
        animation: fadeIn 0.35s ease both;
    }

    .gallery-nav{
        flex:0 0 auto;
        width:42px;
        height:42px;
        border-radius:50%;
        border:none;
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        box-shadow: 0 8px 18px rgba(212,175,55,0.4);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .gallery-nav:hover{
        transform: scale(1.1);
        box-shadow: 0 12px 24px rgba(212,175,55,0.55);
    }

    .gallery-counter{
        text-align:center;
        font-size:0.8rem;
        letter-spacing:1px;
        color:var(--sage-dark);
        margin-bottom:16px;
        font-weight:500;
    }

    .gallery-thumbs{
        display:flex;
        gap:8px;
        overflow-x:auto;
        padding-bottom:4px;
        scrollbar-width:thin;
    }
    .gallery-thumbs::-webkit-scrollbar{ height:6px; }
    .gallery-thumbs::-webkit-scrollbar-thumb{ background: rgba(212,175,55,0.4); border-radius:10px; }

    .gallery-thumb{
        flex:0 0 auto;
        width:56px;
        height:56px;
        border-radius:10px;
        overflow:hidden;
        cursor:pointer;
        border:2px solid transparent;
        opacity:0.65;
        transition: opacity 0.25s ease, border-color 0.25s ease, transform 0.25s ease;
    }
    .gallery-thumb img{
        width:100%;
        height:100%;
        object-fit:cover;
        display:block;
    }
    .gallery-thumb:hover{ opacity:0.9; transform: translateY(-2px); }
    .gallery-thumb.active{
        opacity:1;
        border-color:var(--gold);
    }

    @media (max-width:480px){
        .gallery-modal{ padding:24px 14px 18px; }
        .gallery-nav{ width:36px; height:36px; }
        .gallery-image-wrap{ max-height:42vh; }
        .gallery-image-wrap img{ max-height:42vh; }
        .gallery-thumb{ width:46px; height:46px; }
    }
</style>
</head>
<body>

<!-- floating petals background -->
<div class="petals-container" id="petalsContainer"></div>
<canvas id="confetti-canvas"></canvas>

<!-- =============== ENVELOPE SCENE =============== -->
<section id="envelope-scene">

    <div class="ambient-glow glow-tl"></div>
    <div class="ambient-glow glow-br"></div>

    <div class="bg-gallery">
        <div class="bg-photo bg-photo-1">
            <img src="{{ asset('storage/gallery1.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=300&h=360&fit=crop'">
        </div>
        <div class="bg-photo bg-photo-2">
            <img src="{{ asset('storage/gallery2.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=300&h=360&fit=crop'">
        </div>
        <div class="bg-photo bg-photo-3">
            <img src="{{ asset('storage/gallery3.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=300&h=360&fit=crop'">
        </div>
        <div class="bg-photo bg-photo-4">
            <img src="{{ asset('storage/gallery4.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=300&h=360&fit=crop'">
        </div>
        <div class="bg-photo bg-photo-5">
            <img src="{{ asset('storage/gallery5.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1525258253516-1e26b8968a02?w=300&h=360&fit=crop'">
        </div>
        <div class="bg-photo bg-photo-6">
            <img src="{{ asset('storage/gallery6.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1529636798458-92182e662485?w=300&h=360&fit=crop'">
        </div>
    </div>

    <div class="couple-photo-frame" id="couplePhotoFrame">
        <img src="{{ asset('storage/gallery2.jpg') }}" alt="Michael and Sofia" onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=400&fit=crop'">
    </div>
    <p class="couple-photo-hint">📷 tap photo for our gallery</p>

    <div class="invite-heading">
        <h1>You Are Invited</h1>
        <p>Tap the seal to open</p>
    </div>

    <div class="envelope-wrap">
        <div class="envelope" id="envelope">
            <div class="envelope-body"></div>
            <div class="card-peek"></div>
            <div class="flap-back"></div>
            <div class="flap-top" id="flapTop"></div>
            <div class="ribbon-v"></div>
            <div class="wax-seal" id="waxSeal">
                <i class="fa-solid fa-heart"></i>
            </div>
        </div>
        <div class="tap-hint">✨ click to reveal ✨</div>
    </div>

</section>

<!-- =============== INVITATION SCENE =============== -->
<section id="invitation-scene">
    <div class="invitation-card">
        <div class="card-inner-border">

            <p class="families-line">Together With Their Families</p>

            <div class="couple-names-row">
                <div class="person-photo">
                    <img src="{{ asset('storage/male.jpg') }}" alt="Michael" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop'">
                    <span class="person-label">Groom</span>
                </div>

                <div class="couple-names">
                    <span class="name">Rouin Valen Oeb</span>
                    <span class="amp">&amp;</span>
                    <span class="name">Trisha Mae</span>
                </div>

                <div class="person-photo">
                    <img src="{{ asset('storage/female.jpg') }}" alt="Sofia" onerror="this.src='https://images.unsplash.com/photo-1509783236416-c9ad59bae472?w=300&h=300&fit=crop'">
                    <span class="person-label">Bride</span>
                </div>
            </div>

            <p class="rsvp-invite-text">request the pleasure of your company as they exchange vows and begin their forever, together.</p>

            <hr class="divider">

            <div class="details-grid">
                <div class="detail-box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <h6>Wedding Date</h6>
                    <p>Tuesday<br>December 08, 2026</p>
                </div>
                <div class="detail-box">
                    <i class="fa-solid fa-clock"></i>
                    <h6>Time</h6>
                    <p>9:00 AM</p>
                </div>
                <div class="detail-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <h6>Venue</h6>
                    <p>St. Patrick Garden Hotel - Aparri</p>
                </div>
            </div>

            <p class="quote-line">"We would be honored by your presence as we celebrate our love."</p>

            <!-- =============== RSVP FORM =============== -->
            <div class="rsvp-section">
                <h4><i class="fa-solid fa-envelope-open-text"></i>Will you attend?</h4>

                <form action="{{ url('/rsvp') }}" method="POST" id="rsvpForm">
                    @csrf

                    <label for="guest_name" class="form-label-elegant">Your Name</label>
                    <input
                        type="text"
                        name="guest_name"
                        id="guest_name"
                        class="elegant-input @error('guest_name') is-invalid @enderror"
                        placeholder="Enter your full name"
                        value="{{ old('guest_name') }}" required
                    >
                    @error('guest_name')
                        <div class="invalid-feedback-elegant">{{ $message }}</div>
                    @enderror

                    <div class="attendance-options">
                        <label class="btn-rsvp btn-yes" id="labelYes">
                            <input type="radio" name="attendance_status" value="attending" {{ old('attendance_status') == 'attending' ? 'checked' : '' }}>
                            <i class="fa-solid fa-check"></i> Yes, I'll Be There
                        </label>
                        <label class="btn-rsvp btn-no" id="labelNo">
                            <input type="radio" name="attendance_status" value="not_attending" {{ old('attendance_status') == 'not_attending' ? 'checked' : '' }}>
                            <i class="fa-solid fa-xmark"></i> Sorry, I Can't Attend
                        </label>
                    </div>
                    @error('attendance_status')
                        <div class="invalid-feedback-elegant text-center mt-2">{{ $message }}</div>
                    @enderror

                    <div>
                        <button type="submit" class="btn-submit-rsvp">
                            <i class="fa-solid fa-paper-plane me-2"></i>Send
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<footer class="credit">
    Made with <i class="fa-solid fa-heart" style="color:#D4AF37;"></i> for Rouin Valen Oeb  &amp; Trisha Mae's Wedding
</footer>

<!-- =============== SUCCESS POPUP MODAL =============== -->
@if(session('success'))
<div class="success-overlay" id="successOverlay">
    <div class="success-modal">
        <button type="button" class="success-x" id="successClose" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="success-icon">
            <i class="fa-solid fa-heart"></i>
        </div>
        <h3>Thank You!</h3>
        <p>{{ session('success') }}</p>
        <button type="button" class="success-close-btn" id="successCloseBtn">Close</button>
    </div>
</div>
@endif

<!-- =============== WEDDING PHOTO GALLERY MODAL =============== -->
<div class="gallery-overlay" id="galleryOverlay">
    <div class="gallery-modal">
        <button type="button" class="gallery-close" id="galleryClose" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <h3 class="gallery-title"><i class="fa-solid fa-images"></i>Our Wedding Moments</h3>

        <div class="gallery-viewer">
            <button type="button" class="gallery-nav" id="galleryPrev" aria-label="Previous photo">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="gallery-image-wrap">
                <img id="galleryImage" src="" alt="Wedding photo">
            </div>
            <button type="button" class="gallery-nav" id="galleryNext" aria-label="Next photo">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <p class="gallery-counter"><span id="galleryCounter">1</span> / <span id="galleryTotal">1</span></p>

        <div class="gallery-thumbs" id="galleryThumbs"></div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ============ MOBILE DEVICE DETECTION ============
   Runs immediately (before DOMContentLoaded) so the correct layout
   class is present before first paint - avoids a flash of the wrong
   size. Detects an actual phone/tablet (user agent + touch support),
   not just a narrow desktop browser window. */
(function(){
    var ua = navigator.userAgent || navigator.vendor || '';
    var uaIsMobile = /Android|iPhone|iPad|iPod|IEMobile|BlackBerry|Opera Mini|Mobile|webOS/i.test(ua);
    var hasTouch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
    var isSmallScreen = Math.min(window.innerWidth, window.innerHeight) <= 820;

    if (uaIsMobile || (hasTouch && isSmallScreen)) {
        document.documentElement.classList.add('is-mobile-device');
    } else {
        document.documentElement.classList.add('is-desktop-device');
    }
})();
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* Re-check on resize/orientation change in case of tablet rotation */
    function refreshDeviceClass(){
        var isSmallScreen = Math.min(window.innerWidth, window.innerHeight) <= 820;
        var hasTouch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
        var ua = navigator.userAgent || '';
        var uaIsMobile = /Android|iPhone|iPad|iPod|IEMobile|BlackBerry|Opera Mini|Mobile|webOS/i.test(ua);
        document.documentElement.classList.toggle('is-mobile-device', uaIsMobile || (hasTouch && isSmallScreen));
    }
    window.addEventListener('orientationchange', refreshDeviceClass);
    window.addEventListener('resize', refreshDeviceClass);


    /* ============ FLOATING PETALS ============ */
    const petalsContainer = document.getElementById('petalsContainer');
    const petalColors = ['#F8E8E8', '#D4AF37', '#F3D0D0', '#EBD9B4', '#9CAF88'];
    const petalCount = 22;

    function createPetal(){
        const petal = document.createElement('div');
        petal.classList.add('petal');
        const size = Math.random() * 14 + 10;
        petal.style.width = size + 'px';
        petal.style.height = size * 0.8 + 'px';
        petal.style.left = Math.random() * 100 + 'vw';
        petal.style.background = petalColors[Math.floor(Math.random() * petalColors.length)];
        petal.style.animationDuration = (Math.random() * 8 + 8) + 's';
        petal.style.animationDelay = (Math.random() * 10) + 's';
        petal.style.opacity = Math.random() * 0.5 + 0.4;
        petalsContainer.appendChild(petal);
    }
    for (let i = 0; i < petalCount; i++) createPetal();

    /* ============ ENVELOPE OPEN LOGIC ============ */
    const envelope = document.getElementById('envelope');
    const waxSeal = document.getElementById('waxSeal');
    const envelopeScene = document.getElementById('envelope-scene');
    const invitationScene = document.getElementById('invitation-scene');

    function openEnvelope(){
        if (envelope.classList.contains('open')) return;
        envelope.classList.add('open');
        launchConfetti();

        setTimeout(function(){
            envelopeScene.classList.add('hidden-scene');
            invitationScene.classList.add('show');
            invitationScene.scrollIntoView({behavior:'smooth', block:'start'});
        }, 1300);
    }

    waxSeal.addEventListener('click', function(e){
        e.stopPropagation();
        openEnvelope();
    });
    envelope.addEventListener('click', openEnvelope);

    /* ============ RSVP BUTTON SELECTION STYLING ============ */
    const labelYes = document.getElementById('labelYes');
    const labelNo = document.getElementById('labelNo');
    const radios = document.querySelectorAll('input[name="attendance_status"]');

    function refreshSelection(){
        labelYes.classList.remove('selected');
        labelNo.classList.remove('selected');
        radios.forEach(function(r){
            if (r.checked) {
                if (r.value === 'attending') labelYes.classList.add('selected');
                if (r.value === 'not_attending') labelNo.classList.add('selected');
            }
        });
    }
    radios.forEach(function(r){ r.addEventListener('change', refreshSelection); });
    refreshSelection();

    /* ============ CONFETTI / PETAL BURST ON OPEN ============ */
    const canvas = document.getElementById('confetti-canvas');
    const ctx = canvas.getContext('2d');
    function resizeCanvas(){
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    function launchConfetti(){
        const colors = ['#D4AF37', '#F8E8E8', '#9CAF88', '#FFFFFF', '#EBD9B4'];
        const pieces = [];
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;

        for (let i = 0; i < 80; i++){
            pieces.push({
                x: centerX,
                y: centerY,
                vx: (Math.random() - 0.5) * 12,
                vy: (Math.random() - 1.2) * 10,
                size: Math.random() * 8 + 4,
                color: colors[Math.floor(Math.random()*colors.length)],
                rotation: Math.random() * 360,
                rotSpeed: (Math.random() - 0.5) * 10,
                gravity: 0.25 + Math.random() * 0.15,
                life: 0
            });
        }

        let frame = 0;
        const maxFrames = 130;

        function animate(){
            ctx.clearRect(0,0,canvas.width, canvas.height);
            frame++;
            let stillAlive = false;

            pieces.forEach(function(p){
                p.vy += p.gravity * 0.05;
                p.x += p.vx;
                p.y += p.vy;
                p.rotation += p.rotSpeed;
                p.life++;

                if (p.y < canvas.height + 20){
                    stillAlive = true;
                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.rotation * Math.PI / 180);
                    ctx.fillStyle = p.color;
                    ctx.globalAlpha = Math.max(0, 1 - frame / maxFrames);
                    ctx.beginPath();
                    ctx.ellipse(0, 0, p.size, p.size * 0.6, 0, 0, Math.PI * 2);
                    ctx.fill();
                    ctx.restore();
                }
            });

            if (frame < maxFrames && stillAlive){
                requestAnimationFrame(animate);
            } else {
                ctx.clearRect(0,0,canvas.width, canvas.height);
            }
        }
        animate();
    }

    /* ============ WEDDING PHOTO GALLERY MODAL ============ */
    const weddingPhotos = [
       
        { src: "{{ asset('storage/male.jpg') }}", fallback: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=1000&fit=crop', alt: 'Michael' },
        { src: "{{ asset('storage/female.jpg') }}", fallback: 'https://images.unsplash.com/photo-1509783236416-c9ad59bae472?w=800&h=1000&fit=crop', alt: 'Sofia' },
        { src: "{{ asset('storage/gallery1.jpg') }}", fallback: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&h=1000&fit=crop', alt: 'Wedding moment 1' },
        { src: "{{ asset('storage/gallery2.jpg') }}", fallback: 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800&h=1000&fit=crop', alt: 'Wedding moment 2' },
        { src: "{{ asset('storage/gallery3.jpg') }}", fallback: 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&h=1000&fit=crop', alt: 'Wedding moment 3' },
        { src: "{{ asset('storage/gallery4.jpg') }}", fallback: 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&h=1000&fit=crop', alt: 'Wedding moment 4' },
        { src: "{{ asset('storage/gallery5.jpg') }}", fallback: 'https://images.unsplash.com/photo-1525258253516-1e26b8968a02?w=800&h=1000&fit=crop', alt: 'Wedding moment 5' },
        { src: "{{ asset('storage/gallery6.jpg') }}", fallback: 'https://images.unsplash.com/photo-1529636798458-92182e662485?w=800&h=1000&fit=crop', alt: 'Wedding moment 6' },
        { src: "{{ asset('storage/1.jpg') }}" },
        { src: "{{ asset('storage/2.jpg') }}" },
        { src: "{{ asset('storage/3.jpg') }}" },
        { src: "{{ asset('storage/4.jpg') }}" },
        { src: "{{ asset('storage/5.jpg') }}" },
        { src: "{{ asset('storage/6.jpg') }}" }
    ];

    let galleryIndex = 0;
    const galleryOverlay = document.getElementById('galleryOverlay');
    const galleryImage = document.getElementById('galleryImage');
    const galleryCounter = document.getElementById('galleryCounter');
    const galleryTotal = document.getElementById('galleryTotal');
    const galleryThumbs = document.getElementById('galleryThumbs');
    const galleryPrev = document.getElementById('galleryPrev');
    const galleryNext = document.getElementById('galleryNext');
    const galleryClose = document.getElementById('galleryClose');
    const couplePhotoFrame = document.getElementById('couplePhotoFrame');

    galleryTotal.textContent = weddingPhotos.length;

    // build thumbnail strip once
    weddingPhotos.forEach(function(photo, i){
        const thumb = document.createElement('div');
        thumb.className = 'gallery-thumb';
        thumb.dataset.index = i;
        const img = document.createElement('img');
        img.src = photo.src;
        img.alt = photo.alt;
        img.onerror = function(){ this.onerror = null; this.src = photo.fallback; };
        thumb.appendChild(img);
        thumb.addEventListener('click', function(){ showGalleryPhoto(i); });
        galleryThumbs.appendChild(thumb);
    });

    function showGalleryPhoto(index){
        galleryIndex = (index + weddingPhotos.length) % weddingPhotos.length;
        const photo = weddingPhotos[galleryIndex];
        galleryImage.src = photo.src;
        galleryImage.alt = photo.alt;
        galleryImage.onerror = function(){ this.onerror = null; this.src = photo.fallback; };
        galleryCounter.textContent = galleryIndex + 1;

        document.querySelectorAll('.gallery-thumb').forEach(function(t, i){
            t.classList.toggle('active', i === galleryIndex);
        });
    }

    function openGalleryModal(startIndex){
        showGalleryPhoto(startIndex || 0);
        galleryOverlay.classList.add('show');
        document.body.style.overflow = 'hidden';
        const activeThumb = galleryThumbs.querySelector('.gallery-thumb.active');
        if (activeThumb) activeThumb.scrollIntoView({ behavior:'smooth', inline:'center', block:'nearest' });
    }
    function closeGalleryModal(){
        galleryOverlay.classList.remove('show');
        document.body.style.overflow = '';
    }

    couplePhotoFrame.addEventListener('click', function(){ openGalleryModal(0); });
    galleryClose.addEventListener('click', closeGalleryModal);
    galleryPrev.addEventListener('click', function(){ showGalleryPhoto(galleryIndex - 1); });
    galleryNext.addEventListener('click', function(){ showGalleryPhoto(galleryIndex + 1); });
    galleryOverlay.addEventListener('click', function(e){
        if (e.target === galleryOverlay) closeGalleryModal();
    });
    document.addEventListener('keydown', function(e){
        if (!galleryOverlay.classList.contains('show')) return;
        if (e.key === 'Escape') closeGalleryModal();
        if (e.key === 'ArrowLeft') showGalleryPhoto(galleryIndex - 1);
        if (e.key === 'ArrowRight') showGalleryPhoto(galleryIndex + 1);
    });

    /* If server rendered validation errors or old input exist, auto-open the invitation */
    @if($errors->any() || old('guest_name') || session('success'))
        envelope.classList.add('open');
        envelopeScene.classList.add('hidden-scene');
        invitationScene.classList.add('show');
    @endif

    /* ============ SUCCESS POPUP MODAL ============ */
    @if(session('success'))
        const successOverlay = document.getElementById('successOverlay');
        const successClose = document.getElementById('successClose');
        const successCloseBtn = document.getElementById('successCloseBtn');

        function openSuccessModal(){
            successOverlay.classList.add('show');
            launchConfetti();
            document.body.style.overflow = 'hidden';
        }
        function closeSuccessModal(){
            successOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        // slight delay so it appears after the invitation card has settled in
        setTimeout(openSuccessModal, 900);

        successClose.addEventListener('click', closeSuccessModal);
        successCloseBtn.addEventListener('click', closeSuccessModal);
        successOverlay.addEventListener('click', function(e){
            if (e.target === successOverlay) closeSuccessModal();
        });
        document.addEventListener('keydown', function(e){
            if (e.key === 'Escape') closeSuccessModal();
        });
    @endif

});
</script>

</body>
</html>