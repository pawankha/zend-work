<?xml version="1.0" encoding="UTF-8"?>
<!--============================================================================
Name			    : datawipe.xsl
Author	  		: BlackBelt SmartPhone Defence Ltd
Copyright   	: Copyright (c) 2006 - 2013 BlackBelt SmartPhone Defence Ltd
This material, including documentation and any related computer
programs, is protected by copyright owned by BlackBelt SmartPhone Defence Ltd.
============================================================================-->
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:import href="common.xsl" />
	<xsl:template match="DataWipe">
	<h2 class="infoheader">
		<xsl:call-template name="Stringtranslate">
		<xsl:with-param name="key" select="'Device information'" />
		</xsl:call-template>
	</h2>
        <div class="insideColumn">
		<div class="datawiperow">
		        <div class="datawipelabel">
		            <xsl:call-template name="Stringtranslate">
		                <xsl:with-param name="key" select="'Manufacturer:'" />
		            </xsl:call-template>
		        </div>
		        <div class="datawipecolumn">
		            <xsl:value-of select="./Manufacturer"/>
		        </div>
		</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Model:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./Model"/>
	                </div>
            	</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Device ID:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./DeviceId"/>
	                </div>
		</div>
		<xsl:if test="string-length(./UniqueChipID)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'UniqueChipID:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./UniqueChipID"/>
				</div>
    		</div>
		</xsl:if>
		<xsl:if test="string-length(./SerialNumber)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'SerialNumber:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./SerialNumber"/>
				</div>
    		</div>
		</xsl:if>
		<xsl:if test="string-length(./WiFiAddress)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'WiFiAddress:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./WiFiAddress"/>
				</div>
    		</div>
		</xsl:if>
		<xsl:if test="string-length(./ProductType)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'ProductType:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./ProductType"/>
				</div>
    		</div>
		</xsl:if>
		<xsl:if test="string-length(./ProductVersion)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'ProductVersion:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./ProductVersion"/>
				</div>
    		</div>
		</xsl:if>
		<div class="datawiperow">
	                <div class="datawipelabel">
				<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'IMEI:'" />
				</xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
				<xsl:value-of select="./IMEI"/>
	                </div>
		</div>
		<xsl:if test="string-length(./IMSI)>0">
			<div class="datawiperow">
					<div class="datawipelabel">
						<xsl:call-template name="Stringtranslate">
							<xsl:with-param name="key" select="'IMSI:'" />
						</xsl:call-template>
					</div>
					<div class="datawipecolumn">
						<xsl:value-of select="./IMSI"/>
					</div>
	        </div>
		</xsl:if>
		<xsl:if test="string-length(./ECID)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'ECID:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./ECID"/>
				</div>
    		</div>
		</xsl:if>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Operating system:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./OperatingSystem"/>
	                </div>
            	</div>
           	<div class="datawiperow">&#160;</div>
        	</div>
		<h2 class="infoheader">
	            <xsl:call-template name="Stringtranslate">
	            <xsl:with-param name="key" select="'Memory'" />
	            </xsl:call-template>
        	</h2>
        	<div class="insideColumn">
		   	<div class="datawiperow">
                	<div class="datawipelabel">
			<xsl:call-template name="Stringtranslate">
				<xsl:with-param name="key" select="'Handset memory size:'" />
			</xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./HandsetMemorySize"/>
	                </div>
		</div>
		<xsl:if test="string-length(./MemoryCardSize)>0">
			<div class="datawiperow">
	                	<div class="datawipelabel">
				<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'Memory card size:'" />
				</xsl:call-template>
	                	</div>
		                <div class="datawipecolumn">
					<xsl:choose>
						<xsl:when test="contains(./MemoryCardSize,$NotPresent)">
							<xsl:call-template name="Stringtranslate">
								<xsl:with-param name="key" select="$NotPresent" />
							</xsl:call-template>
						</xsl:when>
						<xsl:when test="contains(./MemoryCardSize,$NotSupported)">
							<xsl:call-template name="Stringtranslate">
								<xsl:with-param name="key" select="$NotSupported" />
							</xsl:call-template>
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="./MemoryCardSize"/>
						</xsl:otherwise>
					</xsl:choose>
		                </div>
			</div>
		</xsl:if>
		<xsl:if test="string-length(./MemoryCardSerialNumber)>0">
			<div class="datawiperow">
			
		                <div class="datawipelabel">
		                    <xsl:call-template name="Stringtranslate">
		                        <xsl:with-param name="key" select="'Memory card serial number:'" />
		                    </xsl:call-template>
		                </div>
		                <div class="datawipecolumn">
					<xsl:choose>
						<xsl:when test="contains(./MemoryCardSerialNumber,$NotPresent)">
							<xsl:call-template name="Stringtranslate">
								<xsl:with-param name="key" select="$NotPresent" />
							</xsl:call-template>
						</xsl:when>
						<xsl:when test="contains(./MemoryCardSerialNumber,$NotSupported)">
							<xsl:call-template name="Stringtranslate">
								<xsl:with-param name="key" select="$NotSupported" />
							</xsl:call-template>
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="./MemoryCardSerialNumber"/>
						</xsl:otherwise>
					</xsl:choose>
		                </div>
			</div>
		</xsl:if>
		<div class="datawiperow">&#160;</div>
		</div>
		<h2 class="infoheader">
            		<xsl:call-template name="Stringtranslate">
                		<xsl:with-param name="key" select="'Wipe information'" />
            		</xsl:call-template>
        	</h2>
	        <div class="insideColumn">
			<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Start date:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./StartDate"/>
	                </div>
		</div>
		<div class="datawiperow">
		        <div class="datawipelabel">
		            <xsl:call-template name="Stringtranslate">
		                <xsl:with-param name="key" select="'Start time:'" />
		            </xsl:call-template>
		        </div>
		        <div class="datawipecolumn">
		            <xsl:value-of select="./StartTime"/>
		        </div>
            	</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Finish date:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./FinishDate"/>
	                </div>
            	</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Finish time:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./FinishTime"/>
	                </div>
            	</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'Internal memory wiped:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./InternalMemoryWiped"/>
	                </div>
            	</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'External memory wiped:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
				<xsl:choose>
					<xsl:when test="contains(./ExternalMemoryWiped,$NotPresent)">
						<xsl:call-template name="Stringtranslate">
							<xsl:with-param name="key" select="$NotPresent" />
						</xsl:call-template>
					</xsl:when>
					<xsl:when test="contains(./ExternalMemoryWiped,$NotSupported)">
						<xsl:call-template name="Stringtranslate">
							<xsl:with-param name="key" select="$NotSupported" />
						</xsl:call-template>
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="./ExternalMemoryWiped"/>
					</xsl:otherwise>
				</xsl:choose>
	                </div>
            	</div>
		<div class="datawiperow">
			<div class="datawipelabel">
				<xsl:call-template name="Stringtranslate">
					<xsl:with-param name="key" select="'Number of wipe passes:'" />
				</xsl:call-template>
			</div>
			<div class="datawipecolumn">
				<xsl:choose>
					<xsl:when test="contains(./WipePasses,'0')">
						<xsl:choose>
							<xsl:when test="contains(./OperatingSystem,'iOS')">
								<xsl:call-template name="Stringtranslate">
									<xsl:with-param name="key" select="'AppleFactoryReset'" />
								</xsl:call-template>
								<xsl:if test="string-length(./ProductVersion)>0">
									<xsl:value-of select="./ProductVersion"/>
								</xsl:if>
							</xsl:when>
							<xsl:when test="contains(./OperatingSystem,'iPhone')">
								<xsl:call-template name="Stringtranslate">
									<xsl:with-param name="key" select="'AppleFactoryReset'" />
								</xsl:call-template>
								<xsl:if test="string-length(./ProductVersion)>0">
									<xsl:value-of select="./ProductVersion"/>
								</xsl:if>
							</xsl:when>
							<xsl:otherwise>
								<xsl:call-template name="Stringtranslate">
									<xsl:with-param name="key" select="'FactoryResetOnly'" />
								</xsl:call-template>
							</xsl:otherwise>
						</xsl:choose>
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="./WipePasses"/>
					</xsl:otherwise>
				</xsl:choose>
			</div>
		</div>
		<xsl:if test="string-length(./WipeType)>0">
			<div class="datawiperow">
				<div class="datawipelabel">
					<xsl:call-template name="Stringtranslate">
						<xsl:with-param name="key" select="'Wipe type:'" />
					</xsl:call-template>
				</div>
				<div class="datawipecolumn">
					<xsl:value-of select="./WipeType"/>
				</div>
            </div>
		</xsl:if>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'DataWipe version:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./DataWipeVersion"/>
	                </div>
            	</div>
		<xsl:if test="string-length(./DeviceInfoVersion)>0">
			<div class="datawiperow">
			
		                <div class="datawipelabel">
		                    <xsl:call-template name="Stringtranslate">
		                        <xsl:with-param name="key" select="'DeviceInfo version:'" />
		                    </xsl:call-template>
		                </div>
		                <div class="datawipecolumn">
		                    <xsl:value-of select="./DeviceInfoVersion"/>
		                </div>
    		</div>
		</xsl:if>
		<xsl:if test="string-length(./DeviceWipeVersion)>0">
			<div class="datawiperow">
		                <div class="datawipelabel">
		                    <xsl:call-template name="Stringtranslate">
		                        <xsl:with-param name="key" select="'DeviceWipe version:'" />
		                    </xsl:call-template>
		                </div>
		                <div class="datawipecolumn">
		                    <xsl:value-of select="./DeviceWipeVersion"/>
		                </div>
    		</div>
		</xsl:if>
		<div class="datawiperow">
		        <div class="datawipelabel">
		            <xsl:call-template name="Stringtranslate">
		                <xsl:with-param name="key" select="'Operator name:'" />
		            </xsl:call-template>
		        </div>
		        <div class="datawipecolumn">
		            <xsl:value-of select="./UserName"/>
		        </div>
	    	</div>
		<div class="datawiperow">
	                <div class="datawipelabel">
	                    <xsl:call-template name="Stringtranslate">
	                        <xsl:with-param name="key" select="'License ID:'" />
	                    </xsl:call-template>
	                </div>
	                <div class="datawipecolumn">
	                    <xsl:value-of select="./LicenseId"/>
	                </div>
            	</div>
		<div class="datawiperow">
		        <div class="datawipelabel">
		            <xsl:call-template name="Stringtranslate">
		                <xsl:with-param name="key" select="'Wipe ID:'" />
		            </xsl:call-template>
		        </div>
		        <div class="datawipecolumn">
		            <xsl:value-of select="./WipeId"/>
		        </div>
            	</div>
           	<div class="datawiperow">&#160;</div>
		</div>
    <xsl:if test="string-length(./CustomValue1)>0 or string-length(./CustomValue2)>0 or string-length(./CustomValue3)>0 or string-length(./CustomValue4)>0 or string-length(./CustomValue5)>0 or string-length(./CustomValue6)>0">
      <h2 class="infoheader">
        <xsl:call-template name="Stringtranslate">
          <xsl:with-param name="key" select="'Custom fields'" />
        </xsl:call-template>
      </h2>
    </xsl:if>
    <div class="insideColumn">
    <xsl:if test="string-length(./CustomValue1)>0">
      <div class="datawiperow">
        <div class="datawipelabel">
          <xsl:value-of select="./CustomName1"/>
        </div>
        <div class="datawipecolumn">
          <xsl:value-of select="./CustomValue1"/>
        </div>
      </div>
    </xsl:if>
    <xsl:if test="string-length(./CustomValue2)>0">
      <div class="datawiperow">
        <div class="datawipelabel">
          <xsl:value-of select="./CustomName2"/>
        </div>
        <div class="datawipecolumn">
          <xsl:value-of select="./CustomValue2"/>
        </div>
      </div>
    </xsl:if>
    <xsl:if test="string-length(./CustomValue3)>0">
      <div class="datawiperow">
        <div class="datawipelabel">
          <xsl:value-of select="./CustomName3"/>
        </div>
        <div class="datawipecolumn">
          <xsl:value-of select="./CustomValue3"/>
        </div>
      </div>
    </xsl:if>
    <xsl:if test="string-length(./CustomValue4)>0">
      <div class="datawiperow">
        <div class="datawipelabel">
          <xsl:value-of select="./CustomName4"/>
        </div>
        <div class="datawipecolumn">
          <xsl:value-of select="./CustomValue4"/>
        </div>
      </div>
    </xsl:if>
    <xsl:if test="string-length(./CustomValue5)>0">
      <div class="datawiperow">
        <div class="datawipelabel">
          <xsl:value-of select="./CustomName5"/>
        </div>
        <div class="datawipecolumn">
          <xsl:value-of select="./CustomValue5"/>
        </div>
      </div>
    </xsl:if>
    <xsl:if test="string-length(./CustomValue6)>0">
      <div class="datawiperow">
        <div class="datawipelabel">
          <xsl:value-of select="./CustomName6"/>
        </div>
        <div class="datawipecolumn">
          <xsl:value-of select="./CustomValue6"/>
        </div>
      </div>
    </xsl:if>
      <div class="datawiperow">&#160;</div>
    </div>
	</xsl:template>
</xsl:stylesheet>
