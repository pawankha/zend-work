<?xml version="1.0" encoding="UTF-8"?>
<!--============================================================================
Name			    : datawipe.xsl
Author	  		: BlackBelt SmartPhone Defence Ltd
Copyright   	: Copyright (c) 2006 - 2013 BlackBelt SmartPhone Defence Ltd
This material, including documentation and any related computer
programs, is protected by copyright owned by BlackBelt SmartPhone Defence Ltd.
============================================================================-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:import href="language_string_translation.xsl" />

	<!-- Parameter which should be given to XSLT processor to successfully create the html output (they have default values so this can be used as standalone)  -->
	<xsl:param name="pathToCSS" select="'Reports/datawipe_style.css'" />
	<xsl:param name="exportMode" select="'false'"/>
    
	<xsl:param name="lang" select="'en'"/>
	<xsl:param name="NotPresent" select="'NotPresent'"/>
	<xsl:param name="NotSupported" select="'NotSupported'"/>
	
	<!-- Define variables for localization -->
	<xsl:variable name="default-lang-file" select="'datawipe_lang_en.xml'" />

<!-- Select language,  -->
	<xsl:param name="lang-file" select="$default-lang-file" />
	<xsl:variable name="language-file">
		<xsl:choose>
			<xsl:when test="document($lang-file)">
				<xsl:value-of select="$lang-file" />
			</xsl:when>
			<xsl:otherwise>
				<xsl:value-of select="$default-lang-file" />
			</xsl:otherwise>
		</xsl:choose>
	</xsl:variable>

    	<xsl:variable name="strs" select="document($lang-file)/TS/context" />

</xsl:stylesheet>
