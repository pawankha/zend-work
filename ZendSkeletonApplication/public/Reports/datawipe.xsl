<?xml version="1.0" encoding="UTF-8" ?>
<!--============================================================================
Name			    : datawipe.xsl
Author	  		: BlackBelt SmartPhone Defence Ltd
Copyright   	: Copyright (c) 2006 - 2013 BlackBelt SmartPhone Defence Ltd
This material, including documentation and any related computer
programs, is protected by copyright owned by BlackBelt SmartPhone Defence Ltd.
============================================================================-->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    	<xsl:import href="device_info.xsl"/>
	<xsl:import href="common.xsl" />
    
    
    <xsl:template match="/">
        <html>
            <head>
                <title>
                    <xsl:call-template name="Stringtranslate">
                        <xsl:with-param name="key" select="'DATAWIPE REPORT'" />
                    </xsl:call-template>
                </title>
                <link rel="stylesheet" type="text/css">
                    <xsl:attribute name="href">
                        <xsl:value-of select="$pathToCSS" />
                    </xsl:attribute>
                </link>
            </head>
            <body>
                <xsl:for-each select="XmlReport">
                   
                    <div class="dwreportcontent">
                        <!--START for report header-->
                        <div class="datawiperow" style="vertical-align: left;">
                            <img class="datawipelogo" src="Reports/Logo.PNG"/>
                            <h1 class="reportheader">
                                
                            </h1>
                        </div>
                        <div class="datawiperow">
                          <br />
                          <h1 class="reportheader">
                              <xsl:call-template name="Stringtranslate">
                                <xsl:with-param name="key" select="'WIPE REPORT'" />
                              </xsl:call-template>
                          </h1>
                        </div>
                        <!--END of report header-->
		    	<!--device info-->
		    	<xsl:apply-templates select="./DataWipe" />
                    </div>
                    <!-- END for each datawipe report -->
                </xsl:for-each>
				
		
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
