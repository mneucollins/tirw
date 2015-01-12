// ** warnell.com db.11x8.5 ** [ HTML 4.01 / XHTML 1.0 ]
// ** GLOBALS **
	  var VAR0;   //  for use inside main <HEAD>
	  var VAR1;   //  for use inside main <BODY>
      var varX;
      var funcX;
      var funcY;
      var a_ALI = new Array(
        "text-align: left; vertical-align: top;",
        "text-align: right; vertical-align: top;",
        "text-align: right; vertical-align: bottom;",
        "text-align: left; vertical-align: bottom;",
        "text-align: center; vertical-align: top;",
        "text-align: center; vertical-align: bottom;",
        "text-align: left; vertical-align: middle;",
        "text-align: right; vertical-align: middle;",
        "text-align: center; vertical-align: middle;" );
      var a_LT = 0;
	  var a_RT = 1; var a_RB = 2; var a_LB = 3; var a_CT = 4;
	  var a_CB = 5; var a_LM = 6; var a_RM = 7; var a_CM = 8;
	  var a_169 = "width: 960px; height: 540px;";
      var p_150 = "padding: 150px;";
	                 var c_N10 = 10; var c_N20 = 20; var c_N30 = 30;
	                 var c_N11 = 11; var c_N21 = 21; var c_N31 = 31;
	  var c_N02 = 2; var c_N12 = 12; var c_N22 = 22; var c_N32 = 32;
      var c_N03 = 3; var c_N13 = 13; var c_N23 = 23;
      var c_N04 = 4; var c_N14 = 14; var c_N24 = 24;  // majik
      var c_N05 = 5; var c_N15 = 15; var c_N25 = 25;  // majic
      var c_N06 = 6; var c_N16 = 16; var c_N26 = 26;  // majiq
      var c_N07 = 7; var c_N17 = 17; var c_N27 = 27;  // magiq
      var c_N08 = 8; var c_N18 = 18; var c_N28 = 28;  // magic
      var c_N09 = 9; var c_N19 = 19; var c_N29 = 29;  // magik
	  var c_ABC = "abcdefghijklmnopqrstuvwxyz";
      var c_ABL = c_ABC.length;
	  var c_HEX = "0123456789ABCDEF";
      var c_SPC = "";
	  var doc = document;
	  function wmail( funcX ) {
        window.open( funcX, "wmailwin", "width=600,height=300" );
      }
      function x_boo() {
        return ( Math.floor( Math.random() * c_N02 ) );
      }
      function x_brn( funcX ) {
		var f0;
        funcX = ( funcX ? funcX : 1 );
	    for ( f0 = 0; f0 < funcX; f0++ )
          doc.write( "&nbsp;<br \/>" );
	  }
      function x_lin( funcX ) {
		var f0;
        funcX = ( funcX ? funcX : 1 );
	    for ( f0 = 0; f0 < funcX; f0++ )
          doc.write( "<br \/>" );
	  }
      function x_rnd( funcX ) {
        return ( Math.floor( Math.random() * funcX ) );
      }
      function x_row( funcX, funcY ) {
		var f0;
		var f1 = "";
	    for ( f0 = 0; f0 < funcX; f0++ )
          f1 += funcY;
        return ( f1 );
	  }
      function x_spc( funcX ) {
		var f0;
		var f1 = "";
	    for ( f0 = 0; f0 < funcX; f0++ )
          f1 += "&nbsp;";
        c_SPC = f1;
        return ( f1 );
	  }
// ** AUDIO **
	  var audFN = "http://www.telusplanet.net/warnell/";
	  function db11x85_audio( funcX, funcY ) {
        doc.write( '<object id="WMP" width="1" height="1"'
          + ' type="application/x-oleobject" standby="loading..."'
          + ' classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95"'
          + ' codebase="http://activex.microsoft.com/activex/controls'
          + '/mplayer/en/nsmp2inf.cab#Version=5,1,52,701">' );
          doc.write( '<param name="fileName"'
            + ' value="' + audFN + funcX + '" />' );
          doc.write( '<param name="volume" value="true" />' );
          doc.write( '<param name="autoStart" value="true" />' );
          doc.write( '<param name="showControls" value="false" />' );
          doc.write( '<param name="loop" value="' + funcY + '" />' );
          doc.write( '<embed src="' + audFN + funcX + '" hidden="-1"'
            + ' type="audio/x-mpeg" loop="' + funcY + '"></embed>' );
        doc.write( '</object' );
      }
// ** PAGE HEADER **
      var otTAB = ""
        + "\<table cellpadding=\"0\" cellspacing=\"0\""
        + " width=\"100%\" height=\"90%\" border=\"0\"\>"
        + "\<tr\>\<td align=\"center\" valign=\"top\"\>";
      var obTAB = "\<\/td\>\<\/tr\>\<\/table\>";
	  function db11x85_page_header() {
        doc.write( "<div>" );
          doc.write( "" + otTAB );
            doc.write( "<table"
              + " cellpadding=\"5\" cellspacing=\"0\""
              + " width=\"810\" height=\"40\" border=\"0\">" );
              doc.write( "<tr>" );
                doc.write( "<td width=\"310\""
                  + " align=\"left\" valign=\"bottom\">" );
                  doc.write( "<font class=\"fio1\">" );
                    doc.write( "<a"
                      + " href=\"http:\/\/warnell.com\/index.htm\" target=\"_top\""
                      + " onmouseover=\"self.status="
                        + "'warnell.com'; return true;\""
                      + " onmouseout=\"self.status="
                        + "'PbN db.11x8.5'; return true;\">" );
                      doc.write( "<font class=\"fio0\">" );
                        doc.write( "<strong>warnell.com<\/strong>" );
                      doc.write( "<\/font>" );
                    doc.write( "<\/a>" );
                      doc.write( "&nbsp;|&nbsp;" );
                        doc.write( "<a"
                          + " href=\"http:\/\/warnell.com\/db11x85\/index.htm\" target=\"_top\""
                          + " onmouseover=\"self.status="
                            + "'db.11x8.5 index'; return true;\""
                          + " onmouseout=\"self.status="
                            + "'PbN db.11x8.5'; return true;\">" );
                          doc.write( "<font class=\"fio0\">" );
                            doc.write( "<strong>db.11x8.5<\/strong>");
                          doc.write( "<\/font>" );
                        doc.write( "<\/a>" );
                          doc.write( "<br \/>" );
                  doc.write( "<\/font>" );
                doc.write( "<\/td>" );
                doc.write( "<td width=\"500\""
                  + " align=\"right\" valign=\"bottom\">" );
                  doc.write( "<font class=\"fio1\">" );
                    doc.write( "<a"
                      + " href=\"http:\/\/warnell.com\/db11x85\/about.htm\" target=\"_top\""
                      + " onmouseover=\"self.status="
                        + "'db.11x8.5 about'; return true;\""
                      + " onmouseout=\"self.status="
                        + "'PbN db.11x8.5'; return true;\">" );
                      doc.write( "<font class=\"fio0\">" );
                        doc.write( ""
                          + "<strong><em>off the page<\/em><\/strong>" );
                      doc.write( "<\/font>" );
                    doc.write( "<\/a>" );
                      doc.write( ""
                        + "&nbsp;&copy;&nbsp;" + db_YY + "&nbsp;" );
                        doc.write( "<a"
                          + " href=\"#\" onclick="
                            + "\"wmail( 'http:\/\/warnell.com\/db11x85\/email.htm' ); return false;\""
                          + " onmouseover=\"self.status="
                            + "'db.11x8.5 email'; return true;\""
                          + " onmouseout=\"self.status="
                            + "'PbN db.11x8.5'; return true;\">" );
                          doc.write( "<font class=\"fio0\">" );
                            doc.write( "<strong>t.warnell<\/strong>" );
                          doc.write( "<\/font>" );
                        doc.write( "<\/a>" );
                          doc.write( ", Canada<br \/>" );
                  doc.write( "<\/font>" );
                doc.write( "<\/td>" );
              doc.write( "<\/tr>" );
            doc.write( "<\/table>" );
          doc.write( "<\/div>" );
          doc.write( "<table"
            + " cellpadding=\"5\" cellspacing=\"0\""
            + " width=\"810\" height=\"40\" border=\"0\">" );
            doc.write( "<tr>" );
              doc.write( "<td width=\"310\""
                + " align=\"left\" valign=\"top\">" );
                doc.write( "<font class=\"fio1\">" );
                  doc.write( "<a"
                    + " href=\"#\" onclick=\"doc.location="
                      + "'view-source:' + this.href; return false;\""
                    + " onmouseover=\"self.status="
                      + "'" + db_FN + ".htm source'; return true;\""
                    + " onmouseout=\"self.status="
                      + "'PbN db.11x8.5'; return true;\">" );
                    doc.write( "<font class=\"fio1\">" );
                      doc.write( ""
                        + "<strong>" + db_FN + ".htm<\/strong>" );
                    doc.write( "<\/font>" );
                  doc.write( "<\/a>" );
                    doc.write( "<br \/>" );
                doc.write( "<\/font>" );
              doc.write( "<\/td>" );
              doc.write( "<td width=\"500\""
                + " align=\"right\" valign=\"top\">" );
                doc.write( "<font class=\"fio1\">" );
                  doc.write( "<a"
                    + " href=\"" + db_FN + ".htm\""
                    + " onmouseover=\"self.status="
                      + "'" + db_TI + "'; return true;\""
                    + " onmouseout=\"self.status="
                      + "'PbN db.11x8.5'; return true;\">" );
                    doc.write( "<font class=\"fio1\">" );
                      doc.write( ""
                        + "<strong>" + db_TI + "<\/strong>" );
                    doc.write( "<\/font>" );
                  doc.write( "<\/a>" );
                    if ( db_ID && db_CO )
                      doc.write( "&nbsp; " + db_ID + ", " + db_CO );
                    doc.write( "<br \/>" );
                doc.write( "<\/font>" );
              doc.write( "<\/td>" );
            doc.write( "<\/tr>" );
          doc.write( "<\/table>" );
        doc.write( "" + obTAB );
	  }
// ** W3C VALIDATION **
      var w3c_a = new Array(
        "xml1", "xml0", "htm1", "htm0", "css1", "css0" );
      var w3c_b = new Array();
      var w3c_c = new Image();
      var w3c_d = 0;
      for ( varX = 0; varX < w3c_a.length; varX++ ) {
        w3c_b[varX] = new Image();
        w3c_b[varX].src = "../w3c_" + w3c_a[varX] + ".gif";
      }
      function w3c_valid( funcX ) {
        doc.write( "&nbsp;<br \/>" );
        if ( !funcX ) {
          doc.write( "&nbsp;<br \/>" );
          doc.write( "<a"
            + " onmouseover=\"w3c_image( i_xml, 0 )\""
            + " onmouseout=\"w3c_image( i_xml, 1 )\""
            + " href=\"http:\/\/validator.w3.org\/check"
              + "?uri=" + doc.location + "\">" );
            doc.write( "<img name=\"i_xml\""
              + " src=\"..\/w3c_xml0.gif\" alt=\"Valid XHTML 1.0 Strict\""
              + " style=\"width: 88px; height: 31px; border: 0\" \/>" );
          doc.write( "<\/a><br \/>" );
          doc.write( "&nbsp;<br \/>" );
        }
		else {
          doc.write( "<a"
            + " onmouseover=\"w3c_image( i_htm, c_N02 )\""
            + " onmouseout=\"w3c_image( i_htm, c_N03 )\""
            + " href=\"http:\/\/validator.w3.org\/check"
              + "?uri=" + doc.location + "\">" );
            doc.write( "<img name=\"i_htm\""
              + " src=\"..\/w3c_htm0.gif\" alt=\"Valid HTML 4.01 Strict\""
              + " style=\"width: 88px; height: 31px; border: 0\" \/>" );
          doc.write( "<\/a>" );
            doc.write( "<a"
              + " onmouseover=\"w3c_image( i_css, c_N04 )\""
              + " onmouseout=\"w3c_image( i_css, c_N05 )\""
              + " href=\"http:\/\/jigsaw.w3.org\/css-validator\/validator"
                + "?uri=" + doc.location + "&usermedium=all\">" );
              doc.write( "<img name=\"i_css\""
                + " src=\"..\/w3c_css0.gif\" alt=\"Valid CSS Level 2\""
                + " style=\"width: 88px; height: 31px; border: 0\" \/>" );
            doc.write( "<\/a><br \/>" );
        }
        doc.write( "&nbsp;<br \/>" );
        doc.write( "&nbsp;<br \/>" );
      }
      function w3c_image( w3c_c, w3c_d ) {
        w3c_c.src = w3c_b[w3c_d].src;
      }
      function xml_valid( funcX ) {
        doc.write( "&nbsp;<br \/>" );
	    doc.write( "<a"
          + " onmouseover=\"self.status='Valid XHTML 1.0 Strict'; return true;\""
          + " onmouseout=\"self.status='PbN db.11x8.5'; return true;\""
          + " href=\"http:\/\/validator.w3.org\/check"
          + "?uri=" + doc.location + "\">" );
          doc.write( "<span style=\"color: #" + funcX + "\">" );
            doc.write( "&#183; X H T M L &#183;<br \/>" );
          doc.write( "<\/span>" );
        doc.write( "<\/a>" );
        doc.write( "&nbsp;<br \/>" );
        doc.write( "&nbsp;<br \/>" );
      }

