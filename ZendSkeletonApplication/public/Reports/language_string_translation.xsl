<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template name="Stringtranslate">
        <xsl:param name="key" />
        <xsl:choose>
            <!-- Normal translation -->
            <xsl:when test="string-length($strs/dwmessage[dwsource=$key]/dwtranslation) > 0">
                <xsl:value-of select="$strs/dwmessage[dwsource=$key]/dwtranslation" />
            </xsl:when>
            <!-- Using the default language if the normal translation failed -->
            <xsl:when test="document($default-lang-file)/DW/DWcontext/dwmessage[dwsource=$key]">
                <xsl:value-of select="document($default-lang-file)/DW/DWcontext/dwmessage[dwsource=$key]/dwtranslation" />
            </xsl:when>
            <!-- Fallback to the actual key value -->
            <xsl:otherwise>
                <xsl:value-of select="$key" />
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>
</xsl:stylesheet>