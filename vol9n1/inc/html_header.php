<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>The Iowa Review Web</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" title="tirw" href="style/tirw.css" type="text/css" />
<!-- ie-only stylesheet: set width for 'browse the archive' box to overcome div auto-size/overflow bug -->
<!--[if IE]>
  <link rel="stylesheet" title="tirw-ieonly" href="style/tirw-ie.css" type="text/css">
<![endif]-->
<script language="Javascript" type="text/javascript" src="inc/tirw.js"></script>
<script language="JavaScript" type="text/javascript">
var archiveIsShowing = false;
function showArchive() {
  var display = (archiveIsShowing) ? 'none' : 'block';
  archiveIsShowing = (archiveIsShowing) ? false : true;
  $('divBrowseArchive').style.display = display;
  var coors = findPos($('linkBrowseArchiveDiv'));
  var left = coors[0]+'px';
  var top  = (coors[1] + 20) + 'px';
  $('divBrowseArchive').style.left = left;
  $('divBrowseArchive').style.top  = top;
  try {
    $('linkBrowseArchive').blur();
  } catch (e) {}
}
function findPos(obj) {
  var curleft = curtop = 0;
  if (obj.offsetParent) {
    curleft = obj.offsetLeft
    curtop = obj.offsetTop
    while (obj = obj.offsetParent) {
      curleft += obj.offsetLeft
      curtop += obj.offsetTop
    }
  }
  return [curleft,curtop];
}
</script>
</head>
<body>


<div id="divBrowseArchive">
<a href= <?php echo "$baseurl/vol9n2/";?> >-- TIR-W Volume 9 no. 2
July 2008</a> Instruments and Playable Text: Stuart Moulthrop<br />
&nbsp;&nbsp;&nbsp;&nbsp;Under Language: Stuart Moulthrop<br />
&nbsp;&nbsp;&nbsp;&nbsp;Concerto for Narrative Data: Judy Malloy<br />
&nbsp;&nbsp;&nbsp;&nbsp;activeReader: Elizabeth Knipe<br />
&nbsp;&nbsp;&nbsp;&nbsp;So Random, PiTP: Shawn Rider<br />
&nbsp;&nbsp;&nbsp;&nbsp;riverIslandQT: John Cayley<br />
&nbsp;&nbsp;&nbsp;&nbsp;The Purpling: Nick Montfort<br />
<br />

<a href=<?php echo "$baseurl/vol9n1/";?> >-- TIR-W Volume 9 no. 1
August 2007</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Multi-Modal Coding: Jason Nelson, Donna Leishman, and Electronic Writing<br />
&nbsp;&nbsp;&nbsp;&nbsp;Interviews: Jason Nelson, Donna Leishman<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Biographical Background<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reception | Role of the Reader<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interface<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Work Process<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronic Literature Community<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Future Work<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Secrets<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Space | State<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Connect Digital | Material Games<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Potentials of the Field<br />
&nbsp;&nbsp;&nbsp;&nbsp;Essays:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Artists on Each Other's Work<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Talan Memmott's Commentary on Each Artist<br />
&nbsp;&nbsp;&nbsp;&nbsp;Artworks:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deviant<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leishman Site<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pandemic Rooms<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nelson Index<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/september06/sept06_txt.html"; ?> >-- TIR-W, Volume 8 no. 3, September 2006</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Interview with Dan Waber; Rita Raley<br />
&nbsp;&nbsp;&nbsp;&nbsp;five by five; Dan Waber bio and Jason Pimble<br />
&nbsp;&nbsp;&nbsp;&nbsp;TLT vs. LL; Ted Warnell<br />
&nbsp;&nbsp;&nbsp;&nbsp;Interview with David Knoebel; Rita Raley<br />
&nbsp;&nbsp;&nbsp;&nbsp;Heart Pole; David Knoebe<br />
&nbsp;&nbsp;&nbsp;&nbsp;Interview with Aya Karpinska; Rita Raley<br />
&nbsp;&nbsp;&nbsp;&nbsp;mar puro; Aya Karpinska<br />
&nbsp;&nbsp;&nbsp;&nbsp;The Nihilanth: Immersivity in a First-Person Gaming Mod; Sandy Baldwin<br />
&nbsp;&nbsp;&nbsp;&nbsp;New Word Order (Video);Sandy Baldwin<br />
&nbsp;&nbsp;&nbsp;&nbsp;Word Museum;William Gillespie<br />
&nbsp;&nbsp;&nbsp;&nbsp;Interview with John Cayley; Sandy Rita Raley<br />
&nbsp;&nbsp;&nbsp;&nbsp;Torus (Video); John Cayley<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/july06/july06_txt.html"; ?> >-- TIR-W, Volume 8, no. 2, June/July 2006</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Editor's Introduction: Reconfiguring Place and Space in New Media Writing;
&nbsp;&nbsp;&nbsp;&nbsp;Scott Rettberg<br />
&nbsp;&nbsp;&nbsp;&nbsp;Workspace is Mediaspace is Cityscape: An Interview with Nick Montfort on Book and Volume; Jeremy Douglass<br />
&nbsp;&nbsp;&nbsp;&nbsp;Written on the Body: An Interview with Shelley Jackson; Scott Rettberg<br />
&nbsp;&nbsp;&nbsp;&nbsp;Behind Fa ade: An Interview with Andrew Stern and Michael Mateas; Brenda Bakker Harger<br />
&nbsp;&nbsp;&nbsp;&nbsp;Avant-Gaming: An Interview with Jane McGonigal; Scott Rettberg<br />
&nbsp;&nbsp;&nbsp;&nbsp;Book and Volume; Nick Montfort<br />
&nbsp;&nbsp;&nbsp;&nbsp;Fa ade; Michael Mateas and Andrew Stern<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/feb06/feb06_txt.html"; ?> >-- TIR-W, Volume 8, no. 1, February/March 2006</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Editor's Introduction; Ben Basan<br />
&nbsp;&nbsp;&nbsp;&nbsp;Sound Art, Art, Music; Douglas Kahn<br />
&nbsp;&nbsp;&nbsp;&nbsp;Speaking Volumes; Brandon Labelle<br />
&nbsp;&nbsp;&nbsp;&nbsp;Firebirds | Firebirds Berlin | Tongues of Fire; Paul DeMarinis<br />
&nbsp;&nbsp;&nbsp;&nbsp;A Brief Lecture on Author/ity; Alexis Bhagat<br /> 
&nbsp;&nbsp;&nbsp;&nbsp;Harvester; Ed Osborn<br />
&nbsp;&nbsp;&nbsp;&nbsp;Honi | Tacotsubo; ADACHI Tomomi<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/oct05/oct05_txt.html"; ?> >-- TIR-W, Volume 7, no. 2, November 2005</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;10:01; Lance Olsen & Tim Guthrie<br />
&nbsp;&nbsp;&nbsp;&nbsp;Pieces of Herself; Juliet Davis<br />
&nbsp;&nbsp;&nbsp;&nbsp;The Bomar Gene; Jason Nelson<br />
&nbsp;&nbsp;&nbsp;&nbsp;News from Erewhon; Millie Niss & Martha Deed<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/aug05/aug05_txt.html"; ?> >-- TIR-W, Volume 7, no. 1, August 2005</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Ask me for the moon; John Zuern<br />
&nbsp;&nbsp;&nbsp;&nbsp;CONSCIOUSNESS, LITERATURE, AND SCIENCE FICTION; Kathleen Ann Goonan<br />
&nbsp;&nbsp;&nbsp;&nbsp;Buyways: Billboards, Automobiles, and the American Landscape; Mike Chasar<br />
&nbsp;&nbsp;&nbsp;&nbsp;An interview with Diana Slattery; Dene Grigar<br />
<br />

<a href=<?php echo "$baseurl/TIRW_Archive/tirweb/archives/04.htm"; ?> >-- TIR-W, Volume 6, 2004</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;New Work; Niss, Deed & Daniels<br />
&nbsp;&nbsp;&nbsp;&nbsp;Two Reviews; Tevis Thompson and Mike Chasar<br />
&nbsp;&nbsp;&nbsp;&nbsp;Remembering Donald Justice; Steven Cramer<br />
&nbsp;&nbsp;&nbsp;&nbsp;An interview & new work; David Silver, Jay David Bolter and Diane Gromala<br />
&nbsp;&nbsp;&nbsp;&nbsp;An interview with Amy Sara Carroll; Heidi Bean<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/tirweb/archives/03.htm"; ?> >-- TIR-W, Volume 5, 2003</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Afterwards; Judy Malloy<br />
&nbsp;&nbsp;&nbsp;&nbsp;Digital Nature: the Case Collection version 2.0; Tal Halpern, Patrick F. Walter<br />
&nbsp;&nbsp;&nbsp;&nbsp;Hacktivism? I didn't know the term existed before I did it; An Interview with Brian Kim Stefans;  Giselle Beiguelman<br />
&nbsp;&nbsp;&nbsp;&nbsp;Pax & An Interview; Stuart Moulthrop and Noah Wardrip-Fruin<br />
&nbsp;&nbsp;&nbsp;&nbsp;An Interview with Margaret Stratton; Leslie Roberts<br />
&nbsp;&nbsp;&nbsp;&nbsp;New Work & Reviews; Heidi Bean, Seth Thompson, Deena Larsen, geniwate, Pamela Gay<br />
&nbsp;&nbsp;&nbsp;&nbsp;An Interview with John Cayley; Brian Kim Stefans<br />
&nbsp;&nbsp;&nbsp;&nbsp;3 Proposals for Bottle Imps; William Poundstone<br />
&nbsp;&nbsp;&nbsp;&nbsp;Self Portrait(s) [as Other(s)] & an Interview; Talan Memmott and M.D. Coverley<br />
&nbsp;&nbsp;&nbsp;&nbsp;New work and an interview; Joseph Tabbi and Anthony Enns<br />
&nbsp;&nbsp;&nbsp;&nbsp;Judd Morrissey & Lori Talley: An Interview & Essay; Jessica Pressman<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/tirweb/archives/02.html"; ?> >-- TIR-W, Volume 4, 2002</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Selected new poems; Ana Marie Uribe<br />
&nbsp;&nbsp;&nbsp;&nbsp;ORIENT; YOUNG HAE CHANG HEAVY INDUSTRIES<br />
&nbsp;&nbsp;&nbsp;&nbsp;Dervish Flowers; Nicolas Clausse and Brian Kim Stefans<br />
&nbsp;&nbsp;&nbsp;&nbsp;New Digital Emblems; William Poundstone and Brian Kim Stefans<br />
&nbsp;&nbsp;&nbsp;&nbsp;"Of Dolls and Monsters" An interview with Shelley Jackson; Rita Raley<br />
&nbsp;&nbsp;&nbsp;&nbsp;Electronic Literature; Ravi Shankar, N. Kathrine Hayles, and Lisa Gitelman<br />
&nbsp;&nbsp;&nbsp;&nbsp;Excerps from Mark Amerika's Oz Blog; Mark Amerika<br />
&nbsp;&nbsp;&nbsp;&nbsp;Inflat-o-space; Jessica Irish<br />
&nbsp;&nbsp;&nbsp;&nbsp;New Media Writing; Marc C. Marino, William Gillespie, and Dirk Stratton<br />
&nbsp;&nbsp;&nbsp;&nbsp;Remembering My Life In/Of Words; Richard Kostelanetz<br />
&nbsp;&nbsp;&nbsp;&nbsp;An Interview, an Essay, a New Media Project; Stephanie Strickland and Jaishree Odin<br />
&nbsp;&nbsp;&nbsp;&nbsp;Our day with Jerry Springer; David Schneidermann<br />
&nbsp;&nbsp;&nbsp;&nbsp;A loss is less and death is not so easy<br />
&nbsp;&nbsp;&nbsp;&nbsp;Experiemental Literature was really the first kick: An interview with Scanner; Rebekah Farrugia<br />
&nbsp;&nbsp;&nbsp;&nbsp;Crowds and Power; Jody Zellen and Thom Swiss<br />
&nbsp;&nbsp;&nbsp;&nbsp;"Red, Black, White and Gray:" An Interview with Motomichi Nakamura;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YOUNG HAE CHANG HEaVY INDUSTRIES Bcc, Motomichi Makamura<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/archives/archives01.html"; ?> >-- TIR-W, Volume 3, 2001</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Reach; Michael Joyce<br />
&nbsp;&nbsp;&nbsp;&nbsp;Training Missions; Joe Amato<br />
&nbsp;&nbsp;&nbsp;&nbsp;Everything after That; Martha Conway<br />
&nbsp;&nbsp;&nbsp;&nbsp;Winter Break; Adrienne Eisen<br />
&nbsp;&nbsp;&nbsp;&nbsp;-][select][test: co][deP][1][oetry]_; mez<br />
&nbsp;&nbsp;&nbsp;&nbsp;The Impermanence Agent; Noah Wardrip-Fruin, a.c.chapman, Brion Moss, Duane Whitehurst<br />
&nbsp;&nbsp;&nbsp;&nbsp;A Long Wild Smile; Jeff Parker<br />
<br />
<a href=<?php echo "$baseurl/TIRW_Archive/archives/archives99-00.html"; ?> >-- TIR-W, Volume 1, 1999 & Volume 2, 2000</a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Book of Job; Ted Warnell<br />
&nbsp;&nbsp;&nbsp;&nbsp;The Universal Resource Locator; M.D. Coverly<br />
&nbsp;&nbsp;&nbsp;&nbsp;Lexia to Perplexia; Talan Memmott<br />
&nbsp;&nbsp;&nbsp;&nbsp;The Birth of Detachment; Jennifer Ley<br />
&nbsp;&nbsp;&nbsp;&nbsp;The 12hr-ISBN-JPEG Project; Brad Brace<br />
&nbsp;&nbsp;&nbsp;&nbsp;City of Bits; Thomas Swiss<br />
&nbsp;&nbsp;&nbsp;&nbsp;Divine Mind Fragment Theater; Jim Andrews<br />
&nbsp;&nbsp;&nbsp;&nbsp;Pronunciation: 'fut, or: A Tool and it's Means; c. allan dinsmore<br />
&nbsp;&nbsp;&nbsp;&nbsp;Simple Harmonic Motion Or, Josephine Baker in the Time Capsule; Diane Greco<br />
&nbsp;&nbsp;&nbsp;&nbsp;Reality Dreams, Scroll One; Joel Weishaus<br />
&nbsp;&nbsp;&nbsp;&nbsp;Broken; Alan Sondheim and Barry Smylie<br />
&nbsp;&nbsp;&nbsp;&nbsp;Mitosis; Kevin Fanning<br />
&nbsp;&nbsp;&nbsp;&nbsp;The dear mr thomas letters; Kevin Fanning<br />
&nbsp;&nbsp;&nbsp;&nbsp;A Fable of Words; Jeffery M. Bochman<br />
<br />

<!--
<a href=<?php echo "$baseurl/TIRW_Archive/archives/archives99-00.html"; ?> >-- TIR-W, 1999 - 2000 archives </a><br />
&nbsp;&nbsp;&nbsp;&nbsp;Endless Suburbs; M.D. Coverley<br />
&nbsp;&nbsp;&nbsp;&nbsp;Frame Work; Robert Kendall<br />
&nbsp;&nbsp;&nbsp;&nbsp;Self-Portrait as Child with Father; Edward Falco<br />
&nbsp;&nbsp;&nbsp;&nbsp;Ferris Wheels; Deena Larsen
-->

</div>

<!-- top -->
<table id="tableHeader" cellspacing="0" cellpadding="0">
<tr id="header"><td id="left"><div style="position:relative; top:0px; left:0px;">
<a href="<?php =dirname($_SERVER['PHP_SELF'])?>"><img style="position:absolute; top:0px; left:0px; z-index:1;" src="images/tirwlogo.jpg" alt="" /></a>
<form name="formSearch" action="search.php" method="GET" onSubmit="return checkValue($('search'), 'Search The Archive');">
<table cellspacing="0" cellpadding="0" style="position:absolute; top: 70px; left:130px; z-index:2; white-space:nowrap; vertical-align:top;">
<tr>
 <td style="padding:0px 3px 0px 0px;"><input style="width:150px;" type="text" id="search" name="search" value="<?php if (!empty($search)) {echo $search;} else {echo 'Search The Archive';}?>" onFocus="clearValue(this, 'Search The Archive');" /></td>
 <td><input style="border:solid 1px #AAAAAA;" type="submit" value="Go" /></td>
 <td style="padding:0px 0px 0px 12px;"><div id="linkBrowseArchiveDiv"><a id="linkBrowseArchive" style="font-size:13px;" href="javascript:showArchive();">Browse The Archive</a></div></td>
</tr>
</table>
</form>
</div></td>
<td id="right"><a href="http://www.uiowa.edu"><img src="images/iowaLogo.png" class="logo" alt="" /></a></td>
</tr>
<tr id="bar"><td id="bar" colspan="2"><!--gray bar--></td></tr>
</table>

