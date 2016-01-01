plugin.org {

  # cat=Organiser - CSS/150/100;      type=string; label= Button link to record:CSS class for a link to the single view
  css.button.linktorecord = linktorecord
  # cat=Organiser - CSS/150/101;      type=string; label= Button download:CSS class for a link for a download
  css.button.linktodownload = linktodownload
  # cat=Organiser - CSS/150/998;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  css.externalLinks       = Click me!
  # cat=Organiser - CSS/150/999;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  css.externalSponsors    = Click me!

  # cat=Organiser - Icons/150/100; type=string; label= Download:path to the download icon with file name
  icon.download = EXT:org/Resources/Public/Images/Icons/download.gif
  # cat=Organiser - Icons/150/101; type=string; label= Shipping:path to the shipping icon with file name
  icon.shipping = EXT:org/Resources/Public/Images/Icons/shipping.gif
  # cat=Organiser - Icons/150/200; type=boolean; label= Flags:Enable flags icon. THis will effect, that all translated downloads will displayed in every language.
  icon.flags.enabled = 0
  # cat=Organiser - Icons/150/201; type=options[ad,ae,af,ag,ai,al,am,an,ao,ar,as,at,au,aw,ax,az,ba,bb,bd,be,bf,bg,bh,bi,bj,bm,bn,bo,br,bs,bt,bv,bw,by,bz,ca,catalonia,cc,cd,cf,cg,ch,ci,ck,cl,cm,cn,co,cr,cs,cu,cv,cx,cy,cz,de,dj,dk,dm,do,dz,ec,ee,eg,eh,england,er,es,et,europeanunion,fam,fi,fj,fk,fm,fo,fr,ga,gb,gd,ge,gf,gh,gi,gl,gm,gn,gp,gq,gr,gs,gt,gu,gw,gy,hk,hm,hn,hr,ht,hu,id,ie,il,in,io,iq,ir,is,it,jm,jo,jp,ke,kg,kh,ki,km,kn,kp,kr,kw,ky,kz,la,lb,lc,li,lk,lr,ls,lt,lu,lv,ly,ma,mc,md,me,mg,mh,mk,ml,mm,mn,mo,mp,mq,mr,ms,mt,mu,mv,mw,mx,my,mz,na,nc,ne,nf,ng,ni,nl,no,np,nr,nu,nz,om,pa,pe,pf,pg,ph,pk,pl,pm,pn,pr,ps,pt,pw,py,qa,qc,re,ro,rs,ru,rw,sa,sb,sc,scotland,sd,se,sg,sh,si,sj,sk,sl,sm,sn,so,sr,st,sv,sy,sz,tc,td,tf,tg,th,tj,tk,tl,tm,tn,to,tr,tt,tv,tw,tz,ua,ug,um,us,uy,uz,va,vc,ve,vg,vi,vn,vu,wales,wf,ws,ye,yt,za,zm,zw]; label= Flags default:Short of language like de, es, fr, gb, it, ...
  icon.flags.default = gb
  # cat=Organiser - Icons/150/202; type=string; label= Flags path:path to the directory which contains the flags. With ending slash! TYPO3 default paths are: for *.gif typo3/gfx/flags/ and for *.png typo3/sysext/t3skin/images/flags/
  icon.flags.path = typo3/sysext/t3skin/images/flags/
  # cat=Organiser - Icons/150/203; type=options[gif,jpg,png]; label= Flags extension:extension of the flag files
  icon.flags.extension = png
  # cat=Organiser - Icons/150/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  icon.externalLinks          = Click me!
  # cat=Organiser - Icons/150/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  icon.externalSponsors       = Click me!

  # cat=Organiser - Pages*/150/100; type=+int; label= home:Uid of your home page
  pages.root =
  # cat=Organiser - Pages*/150/200; type=+int; label= calendar:Uid of your calendar page
  pages.calendar =
  # cat=Organiser - Pages*/150/201; type=+int; label= calendar with expired dates (archive):Uid of your calendar page with expired dates. It is the calendar archive.
  pages.calendar_expired =
  # cat=Organiser - Pages*/150/203; type=+int; label= downloads:Uid of your downloads page
  pages.downloads =
  # cat=Organiser - Pages*/150/204; type=+int; label= event:Uid of your event page
  pages.event =
  # cat=Organiser - Pages*/150/205; type=+int; label= headquarters:Uid of your headquarters page
  pages.headquarters =
  # cat=Organiser - Pages*/150/206; type=+int; label= jobs:Uid of your jobs page
  pages.job =
  # cat=Organiser - Pages*/150/207; type=+int; label= jobs application form:Uid of your page with the apllication form
  pages.jobApply =
  # cat=Organiser - Pages*/150/208; type=+int; label= locations:Uid of your locations page
  pages.location =
  # cat=Organiser - Pages*/150/209; type=+int; label= news:Uid of your news page
  pages.news =
  # cat=Organiser - Pages*/150/210; type=+int; label= newsleter:Uid of your page for subscribing a newsletter
  pages.newsletter =
  # cat=Organiser - Pages*/150/211; type=+int; label= people:Uid of your people page
  pages.staff =
  # cat=Organiser - Pages*/150/212; type=+int; label= services:Uid of your services page
  pages.service =
  # cat=Organiser - Pages*/150/213; type=+int; label= Caddy (events):Uid of your Caddy page for events
  pages.shopping_cart =
  # cat=Organiser - Pages*/150/214; type=+int; label= Caddy (downloads):Uid of your Caddy page for downloads
  pages.shopping_cart_downloads =
  # cat=Organiser - Pages*/150/215; type=+int; label= terms & conditions (events):Uid of your page with terms and conditions for booking events
  pages.terms =
  # cat=Organiser - Pages*/150/216; type=+int; label= terms & conditions (downloads):Uid of your page with terms and conditions for ordering downloads
  pages.terms_downloads =
  # cat=Organiser - Pages*/150/217; type=+int; label= vCard:Uid of your page with the vCard
  pages.vCard =
  # cat=Organiser - Pages*/150/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  pages.externalLinks          = Click me!
  # cat=Organiser - Pages*/150/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  pages.externalSponsors       = Click me!

  # cat=Organiser - Sysfolders*/500/100; type=+int; label= calendar:Uid of the sysfolder with the calendar data
  sysfolder.calendar =
  # cat=Organiser - Sysfolders*/500/103; type=+int; label= downloads:Uid of the sysfolder with the downloads
  sysfolder.downloads =
  # cat=Organiser - Sysfolders*/500/104; type=+int; label= event:Uid of the sysfolder with the event data
  sysfolder.event =
  # cat=Organiser - Sysfolders*/500/105; type=+int; label= headquarters:Uid of the sysfolder with the headquarters data
  sysfolder.headquarters =
  # cat=Organiser - Sysfolders*/500/105; type=+int; label= jobs:Uid of the sysfolder with the jobs data
  sysfolder.job =
  # cat=Organiser - Sysfolders*/500/106; type=+int; label= locations:Uid of the sysfolder with the locations data
  sysfolder.location =
  # cat=Organiser - Sysfolders*/500/107; type=+int; label= news:Uid of the sysfolder with the news data
  sysfolder.news =
  # cat=Organiser - Sysfolders*/500/108; type=+int; label= news:Uid of the sysfolder with the news slider data
  sysfolder.newsSlider =
  # cat=Organiser - Sysfolders*/500/109; type=+int; label= people:Uid of the sysfolder with the people data
  sysfolder.staff =
  # cat=Organiser - Sysfolders*/500/110; type=+int; label= services:Uid of the sysfolder with the services data
  sysfolder.service =
  # cat=Organiser - Sysfolders*/500/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  sysfolder.externalLinks          = Click me!
  # cat=Organiser - Sysfolders*/500/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  sysfolder.externalSponsors       = Click me!

  # cat=Organiser - static url/500/100; type=+int; label= [default] calendar:URL of your calendar (default language)
  url.default.calendar = schedule/
  # cat=Organiser - static url/500/101; type=+int; label= [default] downloads:URL of your downloads manager (default language)
  url.default.downloads = downloads/
  # cat=Organiser - static url/500/107; type=+int; label= [default] Caddy tickets:URL of your Caddy for tickets(default language)
  url.default.shopping_cart = tickets/
  # cat=Organiser - static url/500/108; type=+int; label= [default] Caddy downloads:URL of your Caddy for downloads(default language)
  url.default.shopping_cart_downloads = orders/
  # cat=Organiser - static url/500/109; type=+int; label= [default] terms & conditions for events:URL of your terms and conditions for booking events (default language)
  url.default.terms = tickets/terms/
  # cat=Organiser - static url/500/110; type=+int; label= [default] terms & conditions for downloads:URL of your terms and conditions for ordering downloads (default language)
  url.default.terms_downloads = downloads/terms/
  # cat=Organiser - static url/500/200; type=+int; label= [de] Kalender:URL of your calendar (only if German is configured!)
  url.de.calendar = spielplan/
  # cat=Organiser - static url/500/201; type=+int; label= [de] Downloads:URL of your download manager (only if German is configured!)
  url.de.downloads = downloads/
  # cat=Organiser - static url/500/207; type=+int; label= [de] Warenkorb Eintrittskarten:URL of your Caddy for tickets (only if German is configured!)
  url.de.shopping_cart = karten/
  # cat=Organiser - static url/500/208; type=+int; label= [de] Warenkorb Downloads:URL of your Caddy for downloads (only if German is configured!)
  url.de.shopping_cart_downloads = bestellungen/
  # cat=Organiser - static url/500/209; type=+int; label= [de] AGB Karten:URL of your terms and conditions for booking events (only if German is configured!)
  url.de.terms = karten/agb/
  # cat=Organiser - static url/500/210; type=+int; label= [de] AGB Downloads:URL of your terms and conditions for ordering downloads (only if German is configured!)
  url.de.terms_downloads = downloads/agb/
  # cat=Organiser - static url/500/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  url.externalLinks          = Click me!
  # cat=Organiser - static url/500/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  url.externalSponsors       = Click me!

  # cat=Organiser - Table Downloads/600/100; type=+int; label= table:lable of the downloads table. Example: tx_org_downloads
  table.downloads = tx_org_downloads
  # cat=Organiser - Table Downloads/600/200; type=+int; label= documents:field with uploaded files. Example: documents
  table.downloads.field.documents = documents
  # cat=Organiser - Table Downloads/600/201; type=+int; label= caption:field with the caption. Example: documentscaption
  table.downloads.field.documentscaption = documentscaption
  # cat=Organiser - Table Downloads/600/202; type=+int; label= layout:field with layout. Example: documentslayout
  table.downloads.field.documentslayout = documentslayout
  # cat=Organiser - Table Downloads/600/203; type=+int; label= layout size:field with size layout. Example: documentssize
  table.downloads.field.documentssize = documentssize
  # cat=Organiser - Table Downloads/600/204; type=+int; label= path:field with path. Example: documents_from_path
  table.downloads.field.documents_from_path = documents_from_path
  # cat=Organiser - Table Downloads/600/300; type=+int; label= thumbnails:field with thumbnails. Example: thumbnail
  table.downloads.field.thumbnail = thumbnail
  # cat=Organiser - Table Downloads/600/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  table.externalLinks          = Click me!
  # cat=Organiser - Table Downloads/600/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  table.externalSponsors       = Click me!

  # cat=Organiser - Templates//100; type=string; label= news:Path to the HTML template (#i0076)
  templates.401 = EXT:browser/Resources/Private/Templates/HTML/Foundation/main_03.html
  # cat=Organiser - Templates/100/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  templates.externalLinks          = Click me!
  # cat=Organiser - Templates/100/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  templates.externalSponsors       = Click me!
}


[globalVar = GP:type = 67426]
  plugin.org {
    templates.401 = EXT:browser/Resources/Private/Templates/HTML/newsletter.html
  }
[global]
