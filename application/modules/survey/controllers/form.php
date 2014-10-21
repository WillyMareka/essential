<?php

//include ('c_load.php');
class Form extends MY_Controller
{
    var $rows, $combined_form, $message, $indicators, $questions, $commodities, $commodityOutageOptions, $equipment,$supplies;
    
    public function __construct() {
        parent::__construct();
        
        //print var_dump($this->tValue); exit;
        $this->rows = '';
        $this->combined_form;
        $this->load->module('generate');
        
        /**
         * [$this->questions description]
         * @var [type]
         */
        $this->questions = $this->generate->createQuestionSection();
        
        /**
         * [$this->indicators description]
         * @var [type]
         */
        $this->indicators = $this->generate->createIndicatorSection();
        
        /**
         * [$this->commodities description]
         * @var [type]
         */
        $this->commodities = $this->generate->createCommoditySection();
        
        /**
         * [$this->supplierOptions description]
         * @var [type]
         */
        $this->supplierOptions = $this->generate->createSupplierOptions();
        
        /**
         * [$this->commodityUsageandOutage description]
         * @var [type]
         */
        $this->commodityUsageandOutage = $this->generate->createCommodityUsageandOutageSection();
        
        /**
         * [$this->equipment description]
         * @var [type]
         */
        $this->equipment = $this->generate->createEquipmentSection();
/**
 * [$this->supplies description]
 * @var [type]
 */
        $this->supplies = $this->generate->createSuppliesSection();
    }
    
    public function index() {
    }
    
    public function get_mnh_form() {
        $this->combined_form.= '
		<p style="display:true" class="message success">
			SECTION 1 of 7: FACILITY INFORMATION
		</p>
		<table border="2">

			<thead>
				<th colspan="9">FACILITY INFORMATION</th>
			</thead>
			<tbody>
				<tr>
					<td>Facility Name </td><td>
					<input type="text" size="40">
					</td><td>Facility Tier </td><td><!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
					<input type="text" size="40" >
					</td><td>County </td>
					<td>
					<input type="text" size="40" >
					</td>
				</tr>
				<tr>
					<td>Facility Type </td>
					<td>
					<input type="text" size="40" >
					</td>
					<td>Owned By </td>
					<td>
					<input type="text" size="40" >
					</td>

					<td>District/Sub County </td>
					<td>
					<input type="text" size="40" >
					</td>
				</tr>
			</tbody>
		</table>
		<p class="instruction">
		* For Facility Type(Dispensary, Health Centre etc.)
		* For Owned By (Public/Private/FBO/MOH/NGO)
		</p>
		<table>
			<thead>
				<th colspan="3" >FACILITY CONTACT INFORMATION</th>
			</thead>
			<tbody>
				<tr >
					<th scope="col" colspan="2" >CADRE</th>
					<th>NAME</th>
					<th >MOBILE</th>
					<th >EMAIL</th>
				</tr>
				<tr>
					<td  colspan="2">Facility Incharge </td><td>
					<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
					</td><td>
					<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
					</td>
				</tr>
				<tr>
					<td  colspan="2">MCH Incharge </td><td>
					<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
					</td><td>
					<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
					</td>
				</tr>
				<tr>
					<td  colspan="2">Maternity Incharge </td><td>
					<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
					</td>
				</tr>
			</tbody>
		</table>
		<table>
		<tr>
			<td>
				<th> DOES THIS FACILITY CONDUCT DELIVERIES?</th>
			</td>
			
				
					<td> Yes
					<input type="checkbox">
					No
					<input type="checkbox">
					</td>
				</tr>
			
		</table>
		<table>

				<thead>
				<tr>
					<th colspan ="12">IF NO, WHAT ARE THE MAIN REASONS FOR NOT CONDUCTING DELIVERIES? </br>(multiple selections allowed)</th>
			</tr>
				<tr>
					<th colspan ="2">Inadequate skill</th>
					<th colspan ="2">Inadequate staff</th>
					<th colspan ="2"> Inadequate infrastructure </th>
					<th colspan="2">Inadequate Equipment</th>
					<th colspan ="2"> Inadequate commodities and supplies</th>
					<th colspan ="2"> Other (Please specify)</th>
				</tr>
	</thead>
				<tr>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesSkill" value="1" class="cloned" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesInfra" value="6" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesInfra" value="2" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesCommo" value="3" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesequiip" value="5" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesOther" value="4" />
					<input type="text" name="facRsnNoDeliveries[]" id="rsnDeliveriesOther" value="" />
					</td>

				</tr>
			</table>	
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Nurses</th>
			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			</thead>
			' . $this->questions['nur'] . '
		</table>	
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Beds</th>
			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			</thead>
			' . $this->questions['bed'] . '
		</table>
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Services</th>
			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			</thead>
			' . $this->questions['ser'] . '
		</table>	
		
		
		<table>
		<tr>
		<th colspan="2" >Health Facility Management</th>
		</tr>
		<tr>		
		<th colspan="1">QUESTION</th>
		<th colspan="1">RESPONSE</th>	
		</tr>
		' . $this->questions['commi'] . '
	</table>
	
	</div><!--\.the section-1 -->

	<div id="Yes" class="step">
		<input type="hidden" name="step_name" value="section-2"/>
		<p style="display:true" class="message success">
			SECTION 2 of 7: FACILITY DATA AND MATERNAL AND NEONATAL SERVICE DELIVERY
		</p>
		<table>

			<thead>
				<tr>
					<th colspan="13" >INDICATE THE NUMBER OF DELIVERIES CONDUCTED IN THE FOLLOWING PERIODS </th>
				</tr>
				<tr>
					<th> MONTH</th><th> JANUARY</th><th>FEbrUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th><th> JULY</th><th> AUGUST</th>
					<th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
				</tr>
			</thead>
			<tr>
				<td>' . date('Y') . '</td>
				<td style ="text-align:center;" class="not-read">
				</td>

				<td style ="text-align:center;" class="not-read">
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnmarch_13" name="dnmarch_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnapril_13" name="dnapril_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnmay_13" name="dnmay_13" size="8"class="cloned numbers" />
				</td>
				<td style ="text-align:center;" class="not-read">
				</td>
				<td style ="text-align:center;" class="not-read">
				</td>
				<td style ="text-align:center;" class="not-read">
				</td>
				<td  style ="text-align:center;" class="not-read">
				</td>
				<td style ="text-align:center;" class="not-read">
				</td>
				<td style ="text-align:center;" width="15" class="not-read">
				</td>

				<td style ="text-align:center;" class="not-read">
				</td>
			</tr>
		</table>
       <p style="margin-top:50px"></p>
		<table>
			<thead>
				<tr>
					<th colspan="14" >PROVISION OF Basic Emergency Obstetric Neonatal Care(BEmONC) SIGNAL FUNCTIONS</th>
				</tr>
				<tr><td style="background:#fff" colspan="13"><p class="instruction">
		* Verify this information by looking at patients records: 5 Patients Files, Registers and Partograph
		</p></td></tr>
				<tr>

					<th  colspan="7">SIGNAL FUNCTION</th>
					<th   colspan="2"> WAS IT CONDUCTED? </th>
					<th  colspan="5">INDICATE <span style="text-decoration:underline">PRIMARY</span> CHALLENGE</th>

				</tr>
			</thead>
			' . $this->signalFunctionsSectionPDF . '
		</table>
	
<table>

	
		<tr>
			<th colspan="2" >PROVISION OF Comprehensive Emergency Obstetric and Newborn Care (CEmONC) SERVICES IN THE LAST THREE MONTHS</th>
		</tr>
		<tr><td style="background:#fff" colspan="2"><p class="instruction">
		* Verify this information by looking at patients records: 5 Patients Files, Registers and Partograph
		</p></td></tr>
		<tr>		
		<th>QUESTION</th>
		<th>RESPONSE</th>	
		</tr>
		' . $this->questions['ceoc'] . '
	</table>
	<p style="margin-top:300px"></p>
	<table >
		
				<tr>
					<th colspan="12" >PROVISION OF HIV Testing and Counselling</th>
				</tr>
				<tr><td style="background:#fff" colspan="13"><p class="instruction">
		* Verify this information by looking at patients records: 5 Patients Files and Registers
		</p></td></tr>
				<tr>
					<th>QUESTION</th>
					<th>RESPONSE</th>

				</tr>
	
			' . $this->questions['hiv'] . '
		</table>

		<table >
			<thead>
				<tr>
					<th colspan="12" >PROVISION OF Newborn Care</th>
				
				</tr>
				<tr>
					<th colspan="7">QUESTION</th>
					<th colspan="5">RESPONSE</th>
				</tr>
</thead>
				
			
			' . $this->questions['newb'] . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="2" >PROVISION OF Kangaroo Mother Care</th>
				
				</tr>
				<tr>
					<th colspan="1">QUESTION</th>
					<th colspan="1">RESPONSE</th>
				</tr>
</thead>
				
			
			' . $this->questions['kang'] . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="12" >Preparedness for Delivery</th>
				</tr>
				<tr>
					<th colspan="12" style="background=#fff"> 
					<strong>Criteria : </strong>Adult Resuscitation Kit Complete, Working and Clean	; Newborn Resuscitation Kit Complete, working and clean;
				 Receiving Place ; Adequate Light ; No draft(cold air); Clean (delivery beds, recovery beds and all surfaces)	; Waste Disposal System	
				; Sterilization color-coded	;Sharp Container; Privacy; Delivery Kit		
					</th>
				</tr>
				<tr>
					<th style="width:35%">QUESTION</th>
					<th style="width:65%;text-align:left">RESPONSE</th>

				</tr>
			</thead>
			' . $this->questions['prep'] . '
		</table>
		<p style="display:true" class="message success">
			SECTION 3 of 7: GUIDELINES, JOB AIDS AND TOOLS AVAILABILITY
		</p>
		<table >
			<thead>
				<tr>
					<th colspan="12" >GUIDELINES AVAILABILITY</th>
				</tr>
				<tr>
					<th style="width:35%">ASPECTS</th>
					<th style="width:35%;text-align:left">RESPONSE</th>
					<th style="width:30%;text-align:left">QUANTITY</th>

				</tr>
			</thead>
			' . $this->questions['guide'] . '
		</table>		
		<table >
			<thead>
				<tr>
					<th colspan="12" >JOB AIDS</th>
				</tr>
				<tr>
					<th style="width:35%">ASPECTS</th>
					<th style="width:35%;text-align:left">RESPONSE</th>
					<th style="width:30%;text-align:left">QUANTITY</th>

				</tr>
			</thead>
			' . $this->questions['job'] . '
		</table>
		<table class="centre">

			<thead>
				<tr>
					<th colspan="2" >DOES THE UNIT HAVE THE FOLLOWING TOOLS? </th>
				</tr>

				<tr>
					<th style="width:700px">TOOL</th>
					<th> RESPONSE </th>

				</tr>
			</thead>
			' . $this->indicators['tl'] . '
		</table>
		
		<p style="display:true;margin-top:100px" class="message success">SECTION 4 of 8: STAFF TRAINING
		</p>
		<table class="centre">
		<thead>
			<tr>
				<th colspan="13"  > HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th>
			</tr>
			<tr>

				<th rowspan ="2" style="text-align:left"> Clinical Staff</th>
				<th rowspan ="2" style="text-align:left">Total in Facility</th>
				<th rowspan ="2" style="text-align:left">Total Available On Duty</th>
				<th colspan="2" ># of Staff Trained in Basic Emergency Obstetric Neonatal Care (BEmONC)</th>
				<th colspan="2"># of Staff Trained in Focused Antenatal Care</th>
				<th colspan="2"># of Staff Trained in Post Natal Care</th>
				<th colspan="2"># of Staff Trained in Essential Newborn Care</th>
				<th rowspan ="2">				
					How Many Of The Total Staff Members
					Trained  are still Working in the Marternity/ MCH/ Gynaecological Ward?</th>
			</tr>
			<tr>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
			</tr>
		</thead>
		<tr>
			<td>Doctor</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>Nurse</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>R.C.O.</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
	</table>
	
	<table class="centre">
		<thead>
			<tr>
				<th colspan="13"  > HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th>
			</tr>
			<tr>

				<th rowspan ="2" style="text-align:left"> Clinical Staff</th>
				<th rowspan ="2" style="text-align:left">Total in Facility</th>
				<th rowspan ="2" style="text-align:left">Total Available On Duty</th>
				<th colspan="2" ># of Staff Trained in Maternal and Perinatal death Surveillance and review (MPDSR)</th>
				<th colspan="2"># of Staff Trained in Standards-Based Management and Recognition(SBM-R)</th>
				<th colspan="2"># of Staff Trained in Uterine Balloon Tamponade</th>
				<th colspan="2"># of Staff Trained in PP IUCD</th>
				<th rowspan ="2">				
					How Many Of The Total Staff Members
					Trained are still Working in the Marternity/ MCH/ Gynaecological Ward?</th>
			</tr>
			<tr>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
			</tr>
		</thead>
		<tr>
			<td>Doctor</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>Nurse</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>R.C.O.</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
	</table>
	</div><!--\.section 2-->
<p style="margin-top:100px"></p>
<div id="section-3" class="step">
		<p style="display:true" class="message success">
			SECTION 5 of 8: COMMODITY AVAILABILITY
		</p>
<table>
	<tr>
		<tr>
			<th colspan="2">Main Supplier</th>
		</tr>
		<tr>
            <td>Who is the Main Supplier of the Commodities <strong>Below</strong>?</td>
            <td>' . $this->supplierOptions['mch'] . '</td>
        </tr>
	</tr>
	</table>
	<table>
		<thead>
			<tr class="persist-header">
				<th colspan="14">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
			</tr>
			<tr>
			<td colspan="14" style="background:#ffffff">
				<p class="instruction">* Include all expiry dates(coma-separated) in the format (DD-MM-YYYY)</p>
			</td>
			</tr>

			<tr>
				<th rowspan="2" >Commodity Name</th>
				<th rowspan="2" >Commodity Unit</th>
				<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
				<th rowspan="2"> Main Reason For  Unavailability </th>
				<th colspan="7" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th rowspan="1" colspan="2" >Available Quantities</th>
				
				

			</tr>
			<tr>
				<th >Available</th>
				<th>Not Available</th>
				<th>OPD</th>
				<th>MCH</th>
				<th>U5 Clinic</th>
				<th>Ward</th>
				<th>Pharmacy</th>
				<th>Other</th>
				<th>Not Applicable</th>
				<th>No. of Units</th>
				<th>Expiry Date</th>

			</tr>
			
		</thead>
			' . $this->commodities['ch'] . '

		</table>
	</div><!--\.section-3-->

	
	</div><!--\.section-4-->
<p style="margin-top:100px"></p>
	<div id="section-5" class="step">
		<input type="hidden" name="step_name" value="section-5"/>
		<p style="display:true;margin-top:100px" class="message success">
			SECTION 6 of 8: COMMODITY USAGE
		</p>
		<table >
			<thead>
				<tr>
					<th colspan="11"> IN THE LAST 3 MONTHS INDICATE THE USAGE, NUMBER OF TIMES THE COMMODITY WAS NOT AVAILABLE.</br>
					WHEN THE COMMODITY WAS NOT AVAILABLE WHAT HAPPENED? </th>
				</tr>
				<tr >
					<th colspan="2" rowspan="2">
					<div style="width: 100px" >
						Commodity Name
					</div></th>
					<th rowspan="2"  >					
						Unit Size
					</th>
					<th>					
						Usage
					</th>
					<th  colspan="2">
						Duration of Unavailability
					</th>
					<th  colspan="5">
						When the commodity was not available what happened?
						</br>
						<strong>(Multiple Selections Allowed)</strong>
					</th>

				</tr>

				<tr >
					
					<th colspan="1">Total Units Used</th>
					<th colspan="2">Times Unavailable </th>

					<th colspan="1">
					<div style="width: 100px" >
						Patient purchased the commodity privately
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						Facility purchased the commodity privately
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						Facility received the commodity from another facility
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						The procedure was not conducted
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						The procedure was conducted without the commodity
					</div></th>

				</tr>
			</thead>
			' . $this->commodityUsageandOutage['mnh'] . '
		</table>
	</div><!--\.section-5-->
	<div id="section-6" class="step">
		<input type="hidden" name="step_name" value="section-6"/>
		<p style="display:true;margin-top:100px" class="message success">
			SECTION 7 of 8: I. EQUIPMENT AVAILABILITY AND FUNCTIONALITY
		</p>

		<table>
			<thead>
				<th colspan="9">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT.</th>
			

			<tr>
				<th  rowspan="2">Equipment Name</th>

				<th colspan="2" style="text-align:center">Availability <strong></br> (One Selection Allowed) </strong></th>
				<th colspan="4" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th colspan="2">Available Quantities</th>
			</tr>
			<tr >
		

				<th >Available</th>
				<th>Not Available</th>
				<th>Delivery room</th>
				<th>Pharmacy</th>
				<th>Store</th>
				<th>Other</th>
				<th>Fully-Functional</th>
				<th>Non-Functional</th>
			</tr>
			</thead>
			' . $this->equipment['mnh'] . '
			</table>
			
		<table  class="centre" >
			<thead>
				<tr>
					<th colspan="1" rowspan="2">Testing Supplies</th>

					<th colspan="2" style="text-align:center"> Availability <strong></BR> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </BR><strong> (Multiple Selections Allowed)</strong></th>
					

				</tr>
				<tr >
					<th >Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
				</tr>
			</thead>
			' . $this->supplies['tes'] . '
		</table>

		<p style="display:true" class="message success">
			SECTION 7 of 8: II. KITS/SETS AVAILABILITY
		</p>

		<table>
			<thead>
			<tr>
				<th scope="2" rowspan="2">Delivery Kit Components</th>

				<th colspan="2" style="text-align:center">Availability <strong></br> (One Selection Allowed) </strong></th>
				<th colspan="4" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th colspan="2">Available Quantities</th>
			</tr>
			<tr >
				<th >Available</th>
				<th>Not Available</th>
				<th>Delivery room</th>
				<th>Pharmacy</th>
				<th>Store</th>
				<th>Other</th>
				<th>Fully-Functional</th>
				<!--td>Partially Functional</td-->
				<th>Non-Functional</th>
			</tr>
			</thead>
			' . $this->equipment['dke'] . '

		</table>
<p style="margin-top:100px"></p>
<table>
	<tr>
		<tr>
			<th colspan="2">Main Supplier</th>
		</tr>
		<tr>
            <td>Who is the Main Supplier of the Supplies <strong>Below</strong>?</td>
            <td>' . $this->supplierOptions['ch'] . '</td>
        </tr>
	</tr>
	</table>
		<table>
			<thead>
				<tr>
					<th colspan="10">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING SUPPLIES.INCLUDE REASON FOR UNAVAILABILITY.</th>
				</tr>
				<tr>
					<th colspan="1" rowspan="2">Supplies Name</th>

					<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="1" rowspan="2">Main Reason For  Unavailability</th>
					<th colspan="4" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
					<th colspan="1" rowspan="2">Available Supplies</th>
				
					

				</tr>

				<tr>		
					<th >Available</th>
					<th>Not Available</th>
					<th>Delivery room</th>
					<th>Pharmacy</th>
					<th>Store</th>
					<th>Other</th>	
				</tr>
			</thead>
			' . $this->supplies['mnh'] . '
		</table>
<p style="display:true;margin-top:100px" class="message success">SECTION 7 of 8: III.  RESOURCE AVAILABILITY</p>
		<table>
			<thead>
				<th colspan="10">INDICATE THE AVAILABILITY, LOCATION AND MAIN SOURCE OF THE FOLLOWING.</th>
			
			<tr>
				<th  rowspan="2">Resource Name</th>

				<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
				<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th rowspan="2" > Main Source </th>
				

			</tr>
			<tr >
				<th >Available</th>
				<th>Not Available</th>
				<th>OPD</th>
				<th>MCH</th>
				<th>U5 Clinic</th>
				<th>Maternity</th>
				<th>Other</th>
			</tr>
			</thead>
			' . $this->supplies['mh'] . '
		</table>

		<table >
			<thead>
			<th colspan="12" >INDICATE THE STORAGE AND ACCESS TO WATER BY THE COMMUNITY </th>
				<tr>
			<th  colspan="7">ASPECT</th>
			<th   colspan="5"> RESPONSE </th>			
			<th   colspan="2"> SPECIFY </th>	

		</tr>
		</thead>' . $this->supplies['mhw'] . '
		</table>
 
		 <table  class="centre" >
		<thead><tr>
			<th colspan="6">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th></tr>
		
		<tr>
			<th rowspan="2">Resource Name</th>
			
			<th colspan="2" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th rowspan="2">
			
				Main Supplier
			</th>
			<th rowspan="2">			
				Main Source	
			</th>
		</tr>
		<tr >
			<th >Available</th>
			<th>Never Available</th>		
		</tr>
		</thead>' . $this->equipment['mhw'] . '
		</table>
	</div><!--\.section-6-->

	<div id="section-7" class="step">
		<input type="hidden" name="step_name" value="section-7"/>	
		<table >
			<thead>
				<tr>
					<th colspan="12" >PROVISION OF Waste Disposal</th>
				</tr>
				<tr>
					<th style="width:35%">QUESTION</th>
					<th style="width:65%;text-align:left">RESPONSE</th>
				</tr>
			</thead>
			' . $this->question['waste'] . '
		</table>
		<p class="message success" style="margin-top:200px">SECTION 8 of 8: COMMUNITY STRATEGY</p>
<table class="centre">
			<thead><tr>
				<th colspan="2" >COMMUNITY STRATEGY </th>
					</tr><tr>
				<th  colspan="1" >ASPECT</th>
				<th   colspan="1" > RESPONSE </th>	
			</tr>		
			</thead>
			' . $this->question['cms'] . '
	</table>
	</div><!--\.section-7-->
</form>
';
        echo $this->combined_form;
    }
    
    public function get_mch_form() {
        $this->combined_form.= ' 

		<p style="display:true" class="message success">
	SECTION 1 of 9: FACILITY INFORMATION
</p>
<table border="2">

	<thead>
	<tr>
		<th colspan="9">FACILITY INFORMATION</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Facility Name </td><td>
			<input type="text" size="40">
			</td><td>Facility Tier </td><td><!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
			<input type="text" size="40" >
			</td><td>County </td>
			<td>
			<input type="text" size="40" >
			</td>
		</tr>
		<tr>
			<td>Facility Type </td>
			<td>
			<input type="text" size="40" >
			</td>
			<td>Owned By </td>
			<td>
			<input type="text" size="40" >
			</td>

			<td>District/Sub County </td>
			<td>
			<input type="text" size="40" >
			</td>
		</tr>
	</tbody>
</table>
<p class="instruction">
		* For Facility Type(Dispensary, Health Centre etc.)
		* For Owned By (Public/Private/FBO/MOH/NGO)
</p>
<table>
	<thead>
		<tr>
		<th colspan="8">ASSESSOR INFORMATION </th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Name </td>
			<td>
			<input type="text" size="40">
			</td>
			<td>Designation </td><td><!--input type="text" id="designation" name="designation" class="cloned"  size="40"/-->
			<input type="text" size="40" >
			</td>
			<td>Email </td>
			<td>
			<input type="text" size="40" >
			</td>
			</td><td>Phone Number </td>
			<td>
			<input type="text" size="40" >
			</td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
		<th colspan="4" >HR INFORMATION</th>
		</tr>
	</thead>
	<tbody>
		<tr >
			<th>CADRE</th>
			<th>NAME</th>
			<th >MOBILE</th>
			<th >EMAIL</th>
		</tr>
		<tr>
			<td >Facility Incharge </td><td>
			<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<td >MCH Incharge</td><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<td >Maternity Incharge </td><td>
			<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<td>OPD Incharge</td><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
	</tbody>
</table>
<table class="centre">
		<thead>
			<tr>
				<th colspan="15"  > HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th>
			</tr>
			<tr>

				<th rowspan ="2" style="text-align:left"> Clinical Staff</th>
				<th rowspan ="2" style="text-align:left">Total in Facility</th>
				<th rowspan ="2" style="text-align:left">Total Available On Duty</th>
				<th colspan="2" ># of Staff Trained in IMCI</th>
				<th colspan="2"># of Staff Trained in ICCM</th>
				<th colspan="2"># of Staff Trained in Enhanced Diarrhoea Management</th>
				<th colspan="2"># of Staff Trained in Diarrhoea and Pnemonia CMEs for U5s</th>
				<th colspan="2"># of Staff Trained in EID sample collection training</th>
				<th rowspan ="2">				
					How Many Of The Total Staff Members
					Trained in IMCI are still Working in Child Health Unit?</th>
			</tr>
			<tr>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2013</th>
				<th style="text-align:left">AFTER 2013</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
				<th style="text-align:left">BEFORE 2014</th>
				<th style="text-align:left">AFTER 2014</th>
				<th style="text-align:left">BEFORE 2010</th>
				<th style="text-align:left">AFTER 2010</th>
			</tr>
		</thead>
		<tr>
			<td>Doctor</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>Nurse</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>R.C.O.</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>Pharmaceutical Staff</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>Lab Staff</td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
			<td><input type="text"></td>
		</tr>

	</table>
<table>
  <thead>
  <tr>
	<th colspan = "12">HEALTH SERVICES</th>
	</tr>
	</thead>
	<tbody>
	<tr><td colspan = "10">Where are sick children seen?</td>
	</tr>
	<tr>
		<td>General OPD</td>
		<td><input type="radio" name="children_seen" value="opd", size="40"></td>
		<td>Paediatric OPD</td>
		<td><input type="radio" name="children_seen" value="usclinic",size="40"></td>
		<td>MCH</td>
		<td><input type="radio" name="children_seen" value="mch",size="40"></td>
		<td>Other</td>
		<td><input type="radio" name="children_seen" value="other",size="40"></td>
		<td>If Other, Specify</td>
		<td><input type="text" size="100" name="specify",size="40"></td>
		</tr>

	<tr><td colspan = "10">Where are Early Infant Diagnosis(EID) samples collected in the facility?</td>
	</tr>
	<tr>
		<td>LAB</td>
		<td><input type="radio" name="children_seen" value="opd", size="40"></td>
		<td>MCH</td>
		<td><input type="radio" name="children_seen" value="usclinic",size="40"></td>
		<td>Ward</td>
		<td><input type="radio" name="children_seen" value="mch",size="40"></td>
		<td>CCC</td>
		<td><input type="radio" name="children_seen" value="other",size="40"></td>
		<td>If Other, Specify</td>
		<td><input type="text" size="100" name="specify",size="40"></td>
		</tr>
	</tbody>
</table>

<table>
    <thead>
    	<tr>
    		<th colspan="2">INFRASTRUCTURE: IMCI Consultation Room</th>
    	</tr>
        <tr>
            <th  width="500px">QUESTION</th>
            <th> RESPONSE </th>
        </tr>
    </thead>
    ' . $this->mchConsultationSection . '
</table>
<!--\.the section-1 -->


<div id="section-2" class="step">
	<input type="hidden" name="step_name" value="section-2"/>
	<p style="display:true;margin-top:100px" class="message success">
		SECTION 2 of 9: GUIDELINES, JOB AIDS AND TOOLS
	</p>

	<table class="centre">
		<thead>
			<tr>
				<th colspan="3" >GUIDELINES AND JOB AIDS AVAILABILITY </th>
			</tr>
			<tr>
				<th style="width:500px">ASPECT</th>
				<th>RESPONSE </th>
				<th>If <strong>Yes</strong>, Indicate Total Quantities Available </th>
			</tr>
		</thead>
		' . $this->mchGuidelineAvailabilitySectionPDF . '
	</table>
		<table class="centre">

			<thead>
				<tr>
					<th colspan="2" >DOES THE UNIT HAVE THE FOLLOWING TOOLS? </th>
				</tr>

				<tr>
					<th style="width:700px">TOOL</th>
					<th> RESPONSE </th>

				</tr>
			</thead>
			' . $this->indicators['ror'] . '
		</table>
		<!--table class="centre">

			<thead>
			<tr>
				<th colspan="3" > DATA FROM THE TOOLS </th>
			</tr>
			<tr>
				<th colspan="3" > (A) MALARIA</th>
			</tr>
				<tr>

					<th  rowspan="2" style="width:600px">TREATMENT</th>
					<th colspan="2" style="text-align:center"> Classification</th>

				</tr>
				
				<tr >

					<th>Malaria</th>
					<th>Fever No malaria</th>
					</tr>
					<tr>
				<td colspan="3" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
			</tr>
					</thead>
					<tr>
					<td><textarea style="width:600px;height:100px"></textarea></td>
					<td><input type="radio"></td>
					<td><input type="radio"></td>
					</tr>


			
		</table>
		<table class="centre">

			<thead>
			<tr>
				<th colspan="3" > (B) PNEUMONIA</th>
			</tr>
				<tr>

					<th  rowspan="2" style="width:600px">TREATMENT</th>
					<th colspan="2" style="text-align:center"> Classification</th>

				</tr>
				<tr >

					<th >Severe Pneumonia</th>
					<th>Pneumonia</th>
				</tr>
				<tr>
				<td colspan="3" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
			</tr>
				</thead>
			<tr>
			<td><textarea style="width:600px;height:100px"></textarea></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
			</tr>
			
		</table>
		<table class="centre">

			<thead>
			<tr>
				<th colspan="6" > (C) DIARRHOEA </th>
			</tr>
				<tr>
					<th colspan="5" style="text-align:center"> Classification</th>

				</tr>
				<tr >

					<th >Severe Dehydration</th>
					<th>Some Dehydration</th>
					<th>No Dehydration</th>
					<th>Dysentry</th>
					<th>No Classification</th>
				</tr>
				<tr>
			<td colspan="6" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
		</tr>
			</thead>
			<tr>
			<td><textarea style="width:600px;height:100px"></textarea></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
<td><input type="radio"></td>
<td><input type="radio"></td>
			</tr>
		</table-->

	<p style="margin-top:300px"> </p>

	 <table class="centre">
            <tbody>
                <th colspan="2">TOTAL U5 CHILDREN SEEN IN THE LAST 1 MONTH</th>                
                    <th><input type = "number" id = "totalu5" name = "mchtotalTreatment[totalu5]"/></th>
             <th colspan = "2"></th>

            <tr>
                <th colspan = "5">Classification</th>
            </tr>
            <tr>
                <th colspan="2">Diarrhoea Total</th>
                    <th><input type = "number" id = "diatotal" name = "mchtotalTreatment[diatotal]"/></th>

                <th colspan = "2"></th>
            </tr>
            </tbody>
            <tr>
                        <td>Severe Dehydration: <input type = "number" id = "malsevere" name = "mchtotalTreatment[SevereDehydration]" onkeyup = "additionfunction()"></td>
            <td>Some Dehydration: <input type = "number" id = "malsome" name = "mchtotalTreatment[SomeDehydration]" onkeyup = "additionfunction()"></td>
            <td>No Dehydration: <input type = "number" id = "malnodehydration" name = "mchtotalTreatment[NoDehydration]" onkeyup = "additionfunction()"></td>
            <td>Dysentry: <input type = "number" id = "maldysentry" name = "mchtotalTreatment[Dysentry]" onkeyup = "additionfunction()"></td>
            <td>No Classification: <input type = "number" id = "malnoclass" name = "mchtotalTreatment[NoClassification]" onkeyup = "additionfunction()"></td>
</tr>
            <tr>
                <td>
                    <style type = "text/css">
                        .treatment
                        {
                            cursor: pointer;
                        }
                    </style>
                    <div class = "treatmentdropdownarea" id ="treat">
                   Treatment
                   <textarea style="width:200px;height:200px"></textarea>' . $this->treatments['dia'] . '
                    </div>
                </td>
                <td>
                    <div class = "treatmentdropdownarea" id ="treat">
                    Treatment
                    <textarea style="width:200px;height:200px"></textarea>' . $this->treatments['dia'] . '
                    </div>
                </td>
                <td>
                    <div class = "treatmentdropdownarea" id ="treat">
                    Treatment
                    <textarea style="width:200px;height:200px"></textarea>' . $this->treatments['dia'] . '
                    </div>
                </td>
                <td>
                    <div class = "treatmentdropdownarea" id ="treat">
                    Treatment
                    <textarea style="width:200px;height:200px"></textarea>' . $this->treatments['dia'] . '
                    </div>
                </td>
                <td>
                    <div class = "treatmentdropdownarea" id ="treat">
                    Treatment
                    <textarea style="width:200px;height:200px"></textarea>' . $this->treatments['dia'] . '
                    </div>
                </td>
            </tr>
        </table>
        <table class="centre">
                <tbody>

                    <tr>
                    <th colspan = "2">Pneumonia Total: </th>
                                        <th><input type = "number" id = "pnetotal" name = "mchtotalTreatment[pnetotal]"></th>

                    <th colspan = "3"></th>
                    </tr>
                </tbody>
                <tr>
                                       <td colspan = "3">Severe Pneumonia: <input type = "number" name = "mchtotalTreatment[SeverePneumonia]" id = "severepne" onkeyup = "additionfunction()"></td>
                    <td colspan = "3">Pneumonia: <input type = "number" name = "mchtotalTreatment[Pneumonia]" id = "pne" onkeyup = "additionfunction()"></td>
</tr>
                <tr>
                <td colspan = "3">
                <div class = "treatmentdropdownarea">
                Treatment
                <textarea style="width:500px;height:200px"></textarea>' . $this->treatments['pne'] . '</div>
                </td>
                <td colspan = "3">
                <div class = "treatmentdropdownarea">
                Treatment
                <textarea style="width:500px;height:200px"></textarea>' . $this->treatments['pne'] . '</div>
                </td>
                </tr>

        </table>
        <table class="centre">
            <tbody>
                    <tr>
                    <th colspan = "2">Malaria Total: </th>
                                       <th><input type = "number" id = "malariatotal" name = "mchtotalTreatment[malariatotal]"></th>

                    <th colspan = "3"></th>
                    </tr>
                </tbody>
                <tr>
                                       <td colspan = "3">Confirmed: <input type = "number" name = "mchtotalTreatment[ConfirmedMalaria]" id = "malconfirmed"  onkeyup = "additionfunction()"></td>
                    <td colspan = "3">Not Confirmed(Include Clinical Malaria): <input type = "number" name = "mchtotalTreatment[NotConfirmedMalaria]" id = "malnotconfirmed"  onkeyup = "additionfunction()"></td>
<tr>
                <td colspan = "3">
                <div class = "treatmentdropdownarea">
                <span id = "malTreatmentSection">&nbsp</span>' . $this->treatments['fev'] . '</div>
                </td>
                <td colspan = "3">
                <div class = "treatmentdropdownarea" >
                <span id = "malTreatmentSection_2">&nbsp</span>' . $this->treatments['fev'] . '</div>
                </td>
                </tr>
        </table>


        <table class="centre">

            <tbody>
            <tr>
                <th colspan="2" >Others Total:</th>
                                <th><input type = "number" name = "mchtotalTreatment[OtherTotal]"></th>

            </tr>

            </tbody>
        </table>
<table class="centre">
    <thead>
        <tr>
            <th colspan="3" >ARE THE FOLLOWING DANGER SIGNS ASSESSED IN ONGOING SESSION FOR A CHILD</th>
        </tr>
        <tr>
            <th width="500px" >SERVICE</th>
            <th colspan="2"> RESPONSE </th>
        </tr>
    </thead>
    ' . $this->indicators['sgn'] . '
</table>
<table class="centre">

    <tr>
		<th colspan="5">ASSESSMENT FOR THE MAIN SYMPTOMS IN AN ONGOING SESSION FOR A CHILD</th>
    </tr>
    <tr>
    	<th>
    		DOES THE CHILD HAVE THE SYMPTOM BELOW?
    	</th>
    	<td colspan="4">
    	Yes <input type="radio">No <input type="radio">
    	</td>
    </tr>
    <tr>
    	<td colspan="5" style="background:#ffffff">
			<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
			</p>
    	</td>
    <tr>
        <thead>
        <tr>
            <th width="500px">Symptom</th>

               <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
            <th>1. Cough / Difficulty Breathing</th>
       
        	<th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        </tr>
    </thead>
    
     ' . $this->indicators['pne'] . '

	<tr>
		<th colspan="5">Treatment</th>
	</tr>
	<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
			</tr>
				
			<tr>
			<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
			</tr>
</table>
<p style="margin-top:10px"></p>
<table class="centre">
   
     <tr>
    	<th>
    		DOES THE CHILD HAVE THE SYMPTOM BELOW?
    	</th>
    	<td colspan="4">
    	Yes <input type="radio">No <input type="radio">
    	</td>
    </tr>
    <tr>
    	<td colspan="5" style="background:#ffffff">
			<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
			</p>
    	</td>
    <tr>
     <thead>
        <tr>
            <th width="500px">Symptom</th>

               <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
            <th>2. Diarrhoea</th>
       
        	<th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        </tr>
    </thead>
     ' . $this->indicators['dgn'] . '
     <tr>
		<th colspan="5">Treatment</th>
	</tr>
	<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
			</tr>
				
			<tr>
			<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
			</tr>
</table>
<p style="margin-top:10px"></p>
<table class="centre">
     <tr>
    	<th>
    		DOES THE CHILD HAVE THE SYMPTOM BELOW?
    	</th>
    	<td colspan="4">
    	Yes <input type="radio">No <input type="radio">
    	</td>
    </tr>
    
    <tr>
    	<td colspan="5" style="background:#ffffff">
			<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
			</p>
    	</td>
    <tr>
     <thead>
       <tr>
            <th width="500px">Symptom</th>

               <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
            <th>3. Fever</th>
       
        	<th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        </tr>
    </thead>
     ' . $this->indicators['fev'] . '
     <tr>
		<th colspan="5">Treatment</th>
	</tr>
	<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
			</tr>
				
			<tr>
			<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
			</tr>
</table>
<p style="margin-top:5px"></p>
<table class="centre">
 <tr>
    	<th>
    		DOES THE CHILD HAVE THE SYMPTOM BELOW?
    	</th>
    	<td colspan="4">
    	Yes <input type="radio">No <input type="radio">
    	</td>
    </tr>
    <thead>
    
    <tr>
    	<td colspan="5" style="background:#ffffff">
			<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
			</p>
    	</td>
    <tr>
        <tr>
            <th width="500px">Symptom</th>

               <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
            <th>4. Ear Infection</th>
       
        	<th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        </tr>
    </thead>
     ' . $this->indicators['ear'] . '
     <tr>
		<th colspan="5">Treatment</th>
	</tr>
	<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
			</td>
			</tr>
				
			<tr>
			<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
			</tr>
</table>
<p class="message success">SECTION 3 of 9: DOES THE HCW CHECK FOR THE FOLLOWING CONDITIONS</p>
<table class="centre">
    <thead>
        <tr>
            <th width="500px" rowspan="2">Malnutrition</th>
            <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
        <th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        	</tr>
    </thead>
    <tbody>
     ' . $this->indicators['mal'] . '
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="500px" rowspan="2">Anaemia</th>
            <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
        <th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        	</tr>
    </thead>
    <tbody>
     ' . $this->indicators['anm'] . '
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="500px" rowspan="2">Condition</th>
            <th colspan="2">HCW Response</th>
            <th colspan="2">Assessor Response</th>
        </tr>
        <tr>
        <th width="100px">Response</th>
        	<th width="200px">Findings</th>
        	<th width="100">Response</th>
        	<th width="200px">Findings</th>
        	</tr>
    </thead>
    <tbody>
     ' . $this->indicators['con'] . '
    </tbody>
</table>	
<p style="display:true;margin-top:300px" class="message success">
		SECTION 4 of 9: COMMODITY AND BUNDLING AVAILABILITY
	</p>
	<table>
	<tr>
		<tr>
			<th colspan="2">Main Supplier</th>
		</tr>
		<tr>
            <td>Who is the Main Supplier of the Commodities <strong>Below</strong>?</td>
            <td>' . $this->supplierOptions['ch'] . '</td>
        </tr>
	</tr>
	</table>
	<table>
		<thead>
			<tr class="persist-header">
				<th colspan="14">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
			</tr>
			<tr>
			<td colspan="14" style="background:#ffffff">
				<p class="instruction">* Include all expiry dates(coma-separated) in the format (DD-MM-YYYY)</p>
			</td>
			</tr>

			<tr>
				<th rowspan="2" >Commodity Name</th>
				<th rowspan="2" >Commodity Unit</th>
				<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
				<th rowspan="2"> Main Reason For  Unavailability </th>
				<th colspan="7" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th rowspan="1" colspan="2" >Available Quantities</th>
				
				

			</tr>
			<tr>
				<th >Available</th>
				<th>Not Available</th>
				<th>OPD</th>
				<th>MCH</th>
				<th>U5 Clinic</th>
				<th>Ward</th>
				<th>Pharmacy</th>
				<th>Other</th>
				<th>Not Applicable</th>
				<th>No. of Units</th>
				<th>Expiry Date</th>

			</tr>
			
		</thead>
		' . $this->commodities['ch'] . '

	</table>  
	<p style="margin-top:200px"></p>
	<table>
	<tr>
		<tr>
			<th colspan="2">Main Supplier</th>
		</tr>
		<tr>
            <td>Who is the Main Supplier of the Commodities <strong>Below</strong>?</td>
            <td>' . $this->supplierOptions['ch'] . '</td>
        </tr>
	</tr>
	</table>
	<table  class="centre persist-area" >
	<thead>
	    <tr class="persist-header">
		
			<th colspan="14">BUNDLING: INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES. </th>
		</tr>
		<tr>
			<td colspan="14" style="background:#ffffff">
				<p class="instruction" >* Include all expiry dates(coma-separated) in the format (DD-MM-YYYY)</p>
			</td>
		</tr>
		
		<tr>
			<th rowspan="2" >Commodity Name</th>
			<th rowspan="2">Commodity Unit</th>
			<th colspan="2" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></div>
			</th>
			<th>
			<div style="width: 90%" >
				Main Reason For  Unavailability
			</div>
			</th>
			<th colspan="7" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="1">Available Quantities</th>
			

		</tr>
		<tr >
			
			<th>Available</th>
			<th>Not Available</th>
			<th>Unavailability</th>
			<th>OPD</th>
			<th>MCH</th>
			<th>U5 Clinic</th>
			<th>Ward</th>
			<th>Pharmacy</th>
			<th>Other</th>
			<th>Not Applicable</th>
			<th>No. of Units</th>

		</tr></thead>' . $this->commodities['bun'] . '

	</table>

		
		
	</div><!--\.section 3-->
		
	<div id="section-4" class="step">
		<input type="hidden" name="step_name" value="section-4"/>
		<p style="display:true;margin-top:200px" class="message success">
			SECTION 5 of 9: REVIEW OF RECORDS
		</p>

		

		<table class="centre">
		
		<thead>
		<tr>
			<th colspan="6" > (C) WHAT IS THE MAIN CHALLENGE IN ACCESSING <span style="text-decoration:underline">DATA FROM</span> U5 REGISTERS IN THE LAST 3 MONTHS</th></tr>
		</thead>
		' . $this->selectAccessChallenges . '
		
		
	</table>
	<table class="centre">
			<thead>
				<tr>
					<th colspan="2" >0RAL REHYDRATION THERAPY CORNER ASSESSMENT </th>
				</tr>
				<tr>
			<td colspan="2" style="background:#fff">
				<p class="instruction">* Verify this information by looking at the ORT Regsiter and identifying the location of the ORT Corner</p>
			</td>
			</tr>
				<tr>
					<th  style="width:35%">ASPECT</th>
					<th   style="width:65%;text-align:left"> RESPONSE </th>
				</tr>
			</thead>
			' . $this->questions['ort'] . '
		</table>

	</div><!--\.section-4-->
	
	<div id="section-5" class="step">
		<input type="hidden" name="step_name" value="section-5"/>
		<p style="display:true;margin-top:300px" class="message success">
			SECTION 6 of 9: EQUIPMENT AVAILABILITY AND STATUS
		</p>

		

		<table  class="centre" >
			<thead>
				<tr>
					<th colspan="10">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT AT THE ORT CORNER.</th>
				</tr>
				<tr>
					<th colspan="1" rowspan="2">Equipment Name</th>
					<th colspan="2" style="text-align:center">Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
					<th colspan="2">Available Quantities</th>
				</tr>
				<tr >
					<th >Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
					<th>Fully-Functional</th>
					<th>Non-Functional</th>
				</tr>
			</thead>
			' . $this->equipment['ort'] . '

		</table>

        </div><!--\.section-6-->

		<div id="section-7" class="step">
		<input type="hidden" name="step_name" value="section-7"/>
		<p style="display:true" class="message success">
			SECTION 7 of 9: SUPPLIES AVAILABILITY
		</p>
		<table>
	<tr>
		<tr>
			<th colspan="2">Main Supplier</th>
		</tr>
		<tr>
            <td>Who is the Main Supplier of the Supplies <strong>Below</strong>?</td>
            <td>' . $this->selectMCHOtherSuppliersPDF . '</td>
        </tr>
	</tr>
	</table>
		<table  class="centre" >
			<thead>
				<th colspan="9">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>
				<tr>
					<th colspan="1" rowspan="2">Supplies Name</th>

					<th colspan="2" style="text-align:center"> Availability <strong></BR> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </BR><strong> (Multiple Selections Allowed)</strong></th>
					

				</tr>
				<tr >
					<th >Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
				</tr>
			</thead>
			' . $this->supplies['ch'] . '
		</table>
		<table  class="centre" >
			<thead>
				<tr>
					<th colspan="1" rowspan="2">Testing Supplies</th>

					<th colspan="2" style="text-align:center"> Availability <strong></BR> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </BR><strong> (Multiple Selections Allowed)</strong></th>
					

				</tr>
				<tr >
					<th >Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
				</tr>
			</thead>
			' . $this->supplies['tst'] . '
		</table>
		<p style="display:true" class="message success">
			SECTION 8 of 9: RESOURCE AVAILABILITY
		</p>
			<table>
	<tr>
		<tr>
			<th colspan="2">Main Supplier</th>
		</tr>
		<tr>
            <td>Who is the Main Supplier of the Resources <strong>Below</strong>?</td>
            <td>' . $this->selectMCHOtherSuppliersPDF . '</td>
        </tr>
	</tr>
	</table>
		<table  class="centre" >
			<thead>
				<th colspan="9">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>

				<tr>
					<th colspan="1" rowspan="2">Resource Name</th>
					<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
			

				</tr>
				<tr >
					<th>Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
				</tr>
			</thead>
			' . $this->hardwareMCHSectionPDF . '
		</table>
		<p style="display:true;margin-top:50px" class="message success">
			SECTION 9 of 9: COMMUNITY STRATEGY
		</p>
		<table class="centre">
	<thead>
		<tr>
			<th colspan="2" >COMMUNITY STRATEGY </th>
		</tr>
	</thead>
	<tr>
		<th  style="width:65%">ASPECT</th>
		<th   style="width:35%;text-align:left"> RESPONSE </th>
	</tr>
	' . $this->mchCommunityStrategySection . '
</table>
		

	</div><!--\.section-6 & 7-->
	</div><!--\.section-5-->
				';
        
        echo $this -> combined_form;die;
        // return $this->combined_form;
    }
    public function get_hcw_form() {
        $this->combined_form = '
			<p class="message success">SECTION 1 : FACILITY,HCW and WORK STATION INFORMATION</p>	
			<table border="2">
				<thead>
					<tr>
						<th colspan="9">FACILITY INFORMATION</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Facility Name </td>
						<td>
						<input type="text" size="40">
						</td>
						<td>Facility Tier </td>
						<td><!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
						<input type="text" size="40" >
						</td>
						<td>County </td>
						<td>
							<input type="text" size="40" >
						</td>
					</tr>
					<tr>
					<td>Facility Type </td>
					<td>
					<input type="text" size="40" >
					</td>
					<td>Owned By </td>
					<td>
					<input type="text" size="40" >
					</td>

					<td>District/Sub County </td>
					<td>
					<input type="text" size="40" >
					</td>
					</tr>
				</tbody>
			</table>
				<table>
				<thead>
				<tr>
				<th colspan="4" >FACILITY CONTACT INFORMATION</th>
				</tr>
				</thead>
				<tbody>
				<tr >
				<th >CADRE</th>
				<th>NAME</th>
				<th >MOBILE</th>
				<th >EMAIL</th>
				</tr>
				<tr>
				<td>Incharge </td><td>
				<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
				</td><td>
				<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
				</td>
				<td>
				<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
				</td>
				</tr>
				<tr>
				<td>MCH Incharge</td><td>
				<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
				</td><td>
				<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
				</td>
				<td>
				<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
				</td>
				</tr>
				<tr>
				<td>Maternity Incharge </td><td>
				<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
				</td>
				<td>
				<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
				</td>
				<td>
				<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
				</td>
				</tr>
				<tr>
				<td>Team Lead </td><td>
				<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
				</td>
				<td>
				<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
				</td>
				<td>
				<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
				</td>
				</tr>

				</tbody>
				</table>
				<table>
				<thead>
				<tr>
				<th colspan="8">ASSESSOR INFORMATION </th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>Name </td>
				<td>
				<input type="text" size="40">
				</td>
				<td>Designation </td><td><!--input type="text" id="designation" name="designation" class="cloned"  size="40"/-->
				<input type="text" size="40" >
				</td>
				<td>Email </td>
				<td>
				<input type="text" size="40" >
				</td>
				</td><td>Phone Number </td>
				<td>
				<input type="text" size="40" >
				</td>
				</tr>
				</tbody>
				</table>
				<p class="instruction">
				* For Facility Type(Dispensary, Health Centre etc.)
				* For Owned By (Public/Private/FBO/MOH/NGO)
				</p>
				<table>
				<thead>
				<tr>
				<th colspan="4">HCW Profile </th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td colspan="4">Name of Provider</td>
				</tr>
				<tr>
				<td>First Name</td>
				<td><input type="text"></td>
				<td>Surname</td>
				<td><input type="text"></td>
				</tr>
				<tr>
				<td>National ID</td>
				<td><input type="text"></td>
				<td>Phone Number</td>
				<td><input type="text"></td>
				</tr><tr>
				<td>Personal Number</td>
				<td colspan="3"><input type="text"></td>
				</tr>
				<tr>
				<td colspan="1">Year, Month when trained in IMCI <input type="text"></td>
				<td colspan="3"><p><b>Key coordinator of the training(Select one)</b></p>
				<p><input type="radio">MOH/KPA/CHAI</p>
				<p><input type="radio">MOH only</p>
				<p><input type="radio">Other</p>
				<p>(If other, indicate the name of the coordinator/partner)<input type="text"></p>
				</td>
				</tr>
				<tr>
				<td colspan="1"><label for="">Designation</label></td>
				<td colspan="3"><input type="text"></td>
				</tr>
				' . $this->hcwProfileSection . '
				</tbody>
				<tfoot></tfoot>
				</table>
				<table>
				<thead>
				<tr>
				<th colspan="2">Work Station Profile </th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>Current Service Unit</td>
				<td><input type="text"></td>
				</tr>

				</tbody>
				</table>
				<p class="instruction">
				* If healthcare worker works in many departments, write ALL
				</p>
				<table>
				<thead>
				<tr>
				<th>Question</th>
				<th>Yes</th>
				<th>No</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>
				1.	Is the HCW still working in the original facility they were when they got trained?
				</td>
				<td>
				<input type="radio">
				</td>
				<td>
				<input type="radio">
				</td>
				</tr>
				<tr>
				<td colspan="3">
				If No to question 1 indicate whether the HCW:
				</td>
				</tr>
				<tr>
				<td>
				Transferred to another facility in the same county
				</td>
				<td>
				<input type="radio">
				</td>
				<td>
				<input type="radio">
				</td>
				</tr>
				<tr>
				<td colspan="3">If Yes, indicate name of the facility <input type="text"> </td>
				</tr>
				<tr>
				<td>
				Transferred to another facility in another county
				</td>
				<td>
				<input type="radio">
				</td>
				<td>
				<input type="radio">
				</td>
				</tr>
				<tr>
				<td colspan="3">If  Yes, indicate the name of the county <input type="text"> and facility <input type="text"> </td>
				</tr>
				</tbody>
				</table>
				
				<p class="message success">SECTION 2: OBSERVATION OF CASE MANAGEMENT: ONE CASE PER HCW</p>
				<p class="instruction">
					* Assessor should indicate findings alongside Healthcare Worker findings.
				</p>
				<table class="centre">
					<thead>
						<tr>
						<th colspan="6">CHILD PROFILE</th>
						</tr>
					</thead>
					<tr>
					<td>Gender (M or F)</td><td><input type="text"></td>
					<td>Age (In Months)</td><td><input type="text"></td>
					<td>Presenting complaints?</td><td><input size="100" type="text"></td>            
					</tr>
				</table>
				
				<table class="centre">
					<thead>
						<tr>
							<th colspan="2" >ARE THE FOLLOWING SERVICES OFFERED TO A CHILD</th>
						</tr>
						<tr>
							<th  width="500px">SERVICE</th>
							<th> RESPONSE </th>
							<th> FINDINGS </th>
						</tr>
					</thead>
					' . $this->mchIndicatorsSectionPDF['svc'] . '
				</table>
				
				<table class="centre">
				<thead>
				<tr>
				<th colspan="3" >ARE THE FOLLOWING DANGER SIGNS ASSESSED IN ONGOING SESSION FOR A CHILD</th>
				</tr>
				<tr>
				<th width="500px" >SERVICE</th>
				<th colspan="2"> RESPONSE </th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['sgn'] . '
				</table>

				<p class="message success">SECTION 2A: ASSESSMENT OF THE SICK CHILD AGE 2 MONTHS UP TO 5 YEARS</p>
				<p class="instruction" style="width:1000px">
				* If child is less than two months, move to section 2B.
				</p>

				<table class="centre">

				<tr>
				<th colspan="5">ASSESSMENT FOR THE MAIN SYMPTOMS IN AN ONGOING SESSION FOR A CHILD</th>
				</tr>
				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<thead>
				<tr>
				<th width="500px">Symptom</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th>1. Cough / Difficulty Breathing</th>

				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>

				' . $this->mchIndicatorsSectionPDF['pne'] . '

				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				</table>
				<p style="margin-top:10px"></p>
				<table class="centre">

				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<thead>
				<tr>
				<th width="500px">Symptom</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th>2. Diarrhoea</th>

				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['dgn'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>

				<p class="instruction" >Move to Section 3</p>


				</table>
				<table class="centre">
				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>

				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<thead>
				<tr>
				<th width="500px">Symptom</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th>3. Fever</th>

				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['fev'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				</table>
				<p style="margin-top:5px"></p>
				<table class="centre">
				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<thead>

				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<tr>
				<th width="500px">Symptom</th>
				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th>4. Ear Infection</th>

				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['ear'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				MOVE TO SECTION 3
				</p>
				</td>
				<tr>
				</table>

				<p class="message success" style="margin-top:200px">SECTION 2B: ASSESMENT FOR THE SICK YOUNG INFANT AGE UPTO 2 MONTHS( IF APPLICABLE)</p>
				<table class="centre">
				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<thead>

				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<tr>
				<th width="500px" rowspan="2">1. Very Severe Disease</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>


				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['svd'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				</table>
				<table class="centre">
				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<thead>

				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<tr>
				<th width="500px" rowspan="2">2. Jaundice</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>

				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['jau'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				</table>
				<table class="centre">
				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<thead>

				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<tr>
				<th width="500px" rowspan="2">3. Eye Infection</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>


				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['eye'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				</table>
				<table class="centre">

				<tr>
				<th>
				DOES THE CHILD HAVE THE SYMPTOM BELOW?
				</th>
				<td colspan="4">
				Yes <input type="radio">No <input type="radio">
				</td>
				</tr>
				<tr>
				<td colspan="5" style="background:#ffffff">
				<p class="instruction" style="width:1000px">
				* If NO proceed to the next symptom.
				</p>
				</td>
				<tr>
				<thead>
				<tr>
				<th width="500px">Symptom</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th>4. Diarrhoea</th>

				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['dgn'] . '
				<tr>
				<th colspan="5">Treatment</th>
				</tr>
				<tr>

				<td colspan="5" style="background:#ffffff">
				<p class="instruction" >* Include all treatments used comma separated without regarding the dosages</p>
				</td>
				</tr>

				<tr>
				<td colspan="5"><textarea style="width:1000px;height:100px"></textarea></td>
				</tr>
				</table>
				<table class="centre">

				<thead>
				<tr>
				<th width="500px" rowspan="2">5A: Feeding Problem</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>


				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['fed'] . '

				</table>
				<p class="message success" style="margin-top:200px">IF INFANT IS LESS THAN ONE WEEK</p>

				<table class="centre">

				<thead>
				<tr>
				<th width="500px" rowspan="2">5B: Weight</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>


				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['wgt'] . '

				</table>
				<table class="centre">

				<thead>
				<tr>
				<th width="500px" rowspan="2">6: Special treatment Needs</th>

				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>


				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				' . $this->mchIndicatorsSectionPDF['stn'] . '

				</table>

				<p class="message success">SECTION 3: DOES THE HCW CHECK FOR THE FOLLOWING CONDITIONS</p>
				<table class="centre">
				<thead>
				<tr>
				<th width="500px" rowspan="2">Malnutrition</th>
				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				<tbody>
				' . $this->mchIndicatorsSectionPDF['mal'] . '
				</tbody>
				</table>
				<table class="centre">
				<thead>
				<tr>
				<th width="500px" rowspan="2">Anaemia</th>
				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				<tbody>
				' . $this->mchIndicatorsSectionPDF['anm'] . '
				</tbody>
				</table>
				<table class="centre">
				<thead>
				<tr>
				<th width="500px" rowspan="2">Condition</th>
				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>
				</thead>
				<tbody>
				' . $this->mchIndicatorsSectionPDF['con'] . '
				</tbody>
				</table>
				<table class="centre">
				<thead>
				<tr>
				<th width="500px" rowspan="2">Treatment and Counselling</th>
				<th colspan="2">HCW Response</th>
				<th colspan="2">Assessor Response</th>
				</tr>
				<tr>
				<th width="100px">Response</th>
				<th width="200px">Findings</th>
				<th width="100">Response</th>
				<th width="200px">Findings</th>
				</tr>

				</thead>
				<tbody>
				' . $this->mchIndicatorsSectionPDF['cnl'] . '
				</tbody>
				</table>
				<p class="message success">SECTION 4: CONSULTATION AND EXIT INTERVIEWS</p>
				<table>
				<thead>
				<tr>
				<th width="500px">4.1 Consultation observation</th>
				<th>Case 1</th>
				</tr>


				</thead>
				<tbody>
				' . $this->hcwConsultingAspectsSectionPDF . '

				</tbody>
				<tfoot></tfoot>
				</table>
				<table>
				<thead>
				<tr>
				<th width="500px">4.2 Exit Interview With The Caregiver</th>
				<th>Case 1</th>
				</tr>


				</thead>
				<tbody>
				' . $this->hcwInterviewAspectsSectionPDF . '

				</tbody>
				<tfoot></tfoot>
				</table>
				<table>
				<tr>
				<th colspan="2">ASSESSMENT OUTCOME</th>
				</tr>

				<tr>
				<td>
				<input name="questionResponse_1000" type="radio">	Fully Practicing IMCI
				</td>
				<td>
				</td>
				</tr>
				<tr>
				<td>
				<input name="questionResponse_1000" type="radio">	Practicing with gaps
				</td>
				<td>
				Reason <input name="questionResponseOther_1000" type="text" size="100">
				</td>
				</tr>
				<tr>
				<td>
				<input name="questionResponse_1000" type="radio">	Not practicing at all
				</td>
				<td>
				Reason <input name="questionResponseOther_1000" type="text" size="100">
				</td>
				</tr>
				<tr>

				<th colspan="2">Criteria for Certification: SECTION A</td>
				</tr>

				' . $this->questionPDF['certa'] . '

				<tr>
				<td colspan="2">
				<p class="instruction">
				A participant MUST correctly identify all the above in section <strong>A</strong> to be CERTIFIED
				</p>
				</td>

				</tr>


				<tr>

				<th colspan="2">Checked  for the Following: SECTION B</td>
				</tr>

				' . $this->questionPDF['certb'] . '


				<tr>
				</table>

				<p class="instruction" style="margin-top:400px">
				Where NO, these are gaps identified and the HCW will need mentorship to incorporate these in routine care for the child
				<br/>
				If YES to all, consider HCW for TOT and Mentorship Training
				<br/>
				(NOTE: IF THE HEALTHCARE WORKER FAILS TO ATTAIN ALLTHE POINTS IN SECTION A, THE PARTICIPANT SHOULD BE GIVEN A SECOND CHANCE. IF THE PARTICIPANT FAILS IN THE SECOND ATTEMPT, MENTORSHIP IS RECOMMENDED BEFORE FURTHER ASSESMENT)
				</p>


				<table>
				<thead>
				<tr>
				<th colspan="2">CERTIFICATION</td>
				</tr>
				</thead>

				' . $this->questionPDF['out'] . '
				</table>
				<table>
				<thead>
				<tr>
				<th colspan="2">Share your findings from observational sessions with provider.
				Praise for the things done well and discuss on the identified weakness, show how it could be done.
				<p></p>Ask provdier, for any problems regarding assessment, classification, treatment, counselling, follow up etc and solve the problem instantly.
				Note down the decisions which have been taken to improve the skills and continue the practices</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>Action/s taken by supervisor:</td>
				<td>Action/s taken by supervisee:</td>
				</tr>
				<tr>
				<td><textarea name="hcwConclusionActionSupervisor_1" style="width:400px;height:100px"></textarea></td>
				<td><textarea name="hcwConclusionActionSupervisee_1" style="width:400px;height:100px"></textarea></td>
				</tr>
				<tr>
				<td>Supervisor Signature<input name="hcwConclusionSignatureSupervisor_1" type="text" style="width:500px;padding:10px"></td>
				<td>Supervisee Signature<input name="hcwConclusionSignatureSupervisee_1" type="text" style="width:500px;padding:10px"></td>
				</tr>
				<tr>
				<td>Date	<input name="hcwConclusionDateSupervisor_1" type="text" style="width:500px;padding:10px"></td>
				<td>Date	<input name="hcwConclusionDateSupervisee_1" type="text" style="width:500px;padding:10px"></td>
				</tr>
				</tbody>
				</table>

				<p style="margin-top:0.5px"></p>
				<table style="border:2px solid #666">
				<tr>
				<td><i>Please leave a copy of signed report to respective facility before leaving and send one copy to district within 7 days of visit </i></td>
				</tr>
			</table>

		';
        return $this->combined_form;
    }
    
    public function loadPDF($survey) {
        $stylesheet = ('
			<style>
		input[type="text"]{
			width:200%;
		}
		input[type="number"]{
			width:400px;
		}
		table{
			width:1000px;
		}
		.break { page-break-before: always; }
		.success {
background: #cbc9c9;
color: #000;
border-color: #FFFFEE;
font: bold 100% sans-serif;}
		td{
			background:#d5eaf0;
		}
		th {
text-align: left;
background: #91c5d4;
}
.not-read{
	background:#aaa;
}
.instruction{
	font-weight:bold;
	padding:3px;
	width:1000px;
	margin:0;
	background:#fdde0e;

}
		</style>
		');
        
        //$html = $this -> get_mnh_form();
        //echo $html;die;
        $this->load->library('mpdf');
        $this->mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
        
        switch ($survey) {
            case 'mnh':
                $html = $this->get_mnh_form();
                $this->mpdf->SetTitle('MNH Assessment Tool');
                $this->mpdf->SetHTMLHeader('<p style="border-bottom:2px solid #000;font-size:15px;margin-bottom:40px"><em style="font-weight:bold;padding-right:10px">MNH Assessment Tool:</em> October 2013 - March 2014 (mid-term)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><em style="font-weight:bold">Date Printed: </em>' . date('D, d-M-Y') . '</span></p>');
                $this->mpdf->SetHTMLFooter('<em>MNH Assessment Tool</em> <p style="display:inline-block;vertical-align:top;font-size:14px;font-weight:bold;margin-left:900px">{PAGENO} of {nb}<p>');
                $report_name = 'MNH Assessment Tool' . ".pdf";
                
                // echo $html;die;
                break;

            case 'mch':
                $html = $this->get_mch_form();
                $this->mpdf->SetTitle('CH Assessment Tool');
                $this->mpdf->SetHTMLHeader('<p style="border-bottom:2px solid #000;font-size:15px;margin-bottom:40px"><em style="font-weight:bold;padding-right:10px">CH Assessment Tool:</em> October 2013 - March 2014 (mid-term)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><em style="font-weight:bold">Date Printed: </em>' . date('D, d-M-Y') . '</span></p>');
                $this->mpdf->SetHTMLFooter('<em>CH Assessment Tool</em> <p style="font-size:14px;font-weight:bold;margin-left:900px">{PAGENO} of {nb}<p>');
                
                $report_name = 'CH Assessment Tool' . ".pdf";
                
                //echo $html;die;
                break;

            case 'hcw':
                $html = $this->get_hcw_form();
                $this->mpdf->SetTitle('Follow-Up Tool after IMCI Training');
                $this->mpdf->SetHTMLHeader('<p style="border-bottom:2px solid #000;font-size:15px;margin-bottom:40px"><em style="font-weight:bold;padding-right:10px">Follow-Up Tool after IMCI Training:</em> October 2013 - March 2014&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><em style="font-weight:bold">Date Printed: </em>' . date('D, d-M-Y') . '</span></p>');
                $this->mpdf->SetHTMLFooter('<em>Follow-Up Tool after IMCI Training</em> <p style="font-size:14px;font-weight:bold;margin-left:900px">{PAGENO} of {nb}<p>');
                
                $report_name = 'Follow-Up Tool after IMCI Training' . ".pdf";
                
                //echo $html;die;
                break;
        }
        
        //$this -> mpdf -> setFooter('{PAGENO} of {nb}');
        $this->mpdf->simpleTables = true;
        
        //$this -> mpdf -> WriteHTML($stylesheet, 1);
        $this->mpdf->WriteHTML($stylesheet . $html);
        
        $this->mpdf->Output($report_name, 'I');
    }
}
