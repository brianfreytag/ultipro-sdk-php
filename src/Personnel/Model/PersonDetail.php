<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro\Personnel\Model;

use DateTime;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class PersonDetail implements PersonnelDetailInterface
{
    use PersonnelDetail;

    /** @var string|null */
    private $additionalName1;

   /** @var string|null */
    private $additionalName2;

   /** @var string|null */
    private $addressId;

   /** @var bool */
    private $addressIsOnTaxBoundary = false;

   /** @var double|null */
    private $addressLatitude;

   /** @var string|null */
    private $cobraExport;

   /** @var bool */
    private $cobraIsActive = false;

   /** @var string|null */
    private $cobraReason;

   /** @var string|null */
    private $cobraStatus;

   /** @var DateTime|null */
    private $cobraStatusDate;

   /** @var string|null */
    private $communityBroadcastSmsCode;

   /** @var bool */
    private $consentElectronicW2 = false;

   /** @var bool */
    private $consentElectronicw2pr = false;

   /** @var DateTime|null */
    private $dateDeceased;

   /** @var DateTime|null */
    private $dateOfCobraEvent;

   /** @var DateTime|null */
    private $dateOfCobraExport;

   /** @var DateTime|null */
    private $dateOfCobraLetter;

   /** @var DateTime|null */
    private $dateOfI9Expiration;

   /** @var DateTime|null */
    private $datetimeChanged;

   /** @var DateTime|null */
    private $datetimeCreated;

   /** @var string|null */
    private $disabilityType;

   /** @var string|null */
    private $ethnicDescription;

   /** @var string|null */
    private $formerName;

   /** @var string|null */
    private $healthBloodType;

   /** @var string|null */
    private $healthEyes;

   /** @var string|null */
    private $healthHair;

   /** @var string|null */
    private $healthHeightFeet;

   /** @var string|null */
    private $healthHeightInches;

   /** @var DateTime|null */
    private $healthLastDonateDate;

   /** @var float */
    private $healthWeight = 0;

   /** @var string|null */
    private $i9AlienNumber;

   /** @var string|null */
    private $i9DocA;

   /** @var string|null */
    private $i9DocB;

   /** @var string|null */
    private $i9DocC;

   /** @var bool */
    private $i9Verified = false;

   /** @var string|null */
    private $i9VisaType;

   /** @var string|null */
    private $i9WorkAuth;

   /** @var bool */
    private $isDisabled = false;

   /** @var bool */
    private $isMultiPayGroup = false;

   /** @var bool */
    private $isSmoker = false;

   /** @var bool */
    private $militaryService = false;

   /** @var string|null */
    private $militaryBranchServed;

   /** @var string|null */
    private $militaryEra;

   /** @var string */
    private $militaryIsDisabledVet = 'N';

   /** @var string */
    private $militaryIsOthEligVet = 'N';

   /** @var string|null */
    private $militaryIsOthEligVetBasis;

   /** @var string */
    private $militaryIsActiveWartimeVet = 'D';

   /** @var string|null */
    private $nameFormer;

   /** @var string|null */
    private $previousSSN;

   /** @var string|null */
    private $originCountry;

   /** @var string|null */
    private $originLocation;

   /** @var bool */
    private $w2IsDeceased = false;

   /** @var string|null */
    private $cobraNotes;

   /** @var string|null */
    private $addressSms;

   /** @var DateTime|null */
    private $militarySeparationDate;

   /** @var bool */
    private $homePhoneIsPrivate = false;

   /** @var bool */
    private $smsApprovals = false;

   /** @var bool */
    private $smsPayNotification = false;

    /** @var DateTime|null */
    private $i9VisaExpirationDate;

    /** @var string|null */
    private $militaryIsMedalVet;

   /** @var string|null */
    private $lastNameNotSameAsSSCard;

   /** @var string|null */
    private $chkCashingInstCode;

   /** @var string|null */
    private $nationality1;

   /** @var string|null */
    private $nationality2;

   /** @var string|null */
    private $nationality3;

   /** @var string|null */
    private $userName;

   /** @var string|null */
    private $firstName;

   /** @var string|null */
    private $middleName;

   /** @var string|null */
    private $lastName;

   /** @var string|null */
    private $preferredName;

   /** @var string|null */
    private $namePrefixCode;

   /** @var string|null */
    private $nameSufixCode;

   /** @var string|null */
    private $emailAddress;

   /** @var string|null */
    private $emailAddressAlternate;

   /** @var string|null */
    private $homePhone;

   /** @var string|null */
    private $homePhoneCountry;

   /** @var string|null */
    private $addressLine1;

   /** @var string|null */
    private $addressLine2;

   /** @var string|null */
    private $addressCity;

   /** @var string|null */
    private $addressState;

   /** @var string|null */
    private $addressZipCode;

   /** @var string|null */
    private $addressCountry;

   /** @var string|null */
    private $addressCounty;

   /** @var DateTime|null */
    private $dateOfBirth;

   /** @var string|null */
    private $gender;

   /** @var string|null */
    private $ethnicIDCode;

   /** @var string|null */
    private $maritalStatusCode;

   /**
    * DANGER! DANGER! Ultipro returns FULL SSNs over the API!!!!!!!!!
    *
    * To protect myself and users, I filter down to the last 4 digits in the setter.
    *
    * If you would like to get the full SSN, you can extend this class in your own code
    * and change the setter to receive the full value of what shows up in this private parameter.
    *
    * @var string|null
    */
    private $ssn;

    /** @var bool */
    private $ssnIsSuppressed = true;

    /**
     * @return null|string
     */
    public function getAdditionalName1()
    {
        return $this->additionalName1;
    }

    /**
     * @param null|string $additionalName1
     *
     * @return PersonDetail
     */
    public function setAdditionalName1(?string $additionalName1)
    {
        $this->additionalName1 = $additionalName1;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdditionalName2()
    {
        return $this->additionalName2;
    }

    /**
     * @param null|string $additionalName2
     *
     * @return PersonDetail
     */
    public function setAdditionalName2(?string $additionalName2)
    {
        $this->additionalName2 = $additionalName2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param null|string $addressId
     *
     * @return PersonDetail
     */
    public function setAddressId(?string $addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAddressIsOnTaxBoundary()
    {
        return $this->addressIsOnTaxBoundary;
    }

    /**
     * @param bool $addressIsOnTaxBoundary
     *
     * @return PersonDetail
     */
    public function setAddressIsOnTaxBoundary(bool $addressIsOnTaxBoundary)
    {
        $this->addressIsOnTaxBoundary = $addressIsOnTaxBoundary;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getAddressLatitude()
    {
        return $this->addressLatitude;
    }

    /**
     * @param float|null $addressLatitude
     *
     * @return PersonDetail
     */
    public function setAddressLatitude(?float $addressLatitude)
    {
        $this->addressLatitude = $addressLatitude;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCobraExport()
    {
        return $this->cobraExport;
    }

    /**
     * @param null|string $cobraExport
     *
     * @return PersonDetail
     */
    public function setCobraExport(?string $cobraExport)
    {
        $this->cobraExport = $cobraExport;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCobraIsActive()
    {
        return $this->cobraIsActive;
    }

    /**
     * @param bool $cobraIsActive
     *
     * @return PersonDetail
     */
    public function setCobraIsActive(bool $cobraIsActive)
    {
        $this->cobraIsActive = $cobraIsActive;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCobraReason()
    {
        return $this->cobraReason;
    }

    /**
     * @param null|string $cobraReason
     *
     * @return PersonDetail
     */
    public function setCobraReason(?string $cobraReason)
    {
        $this->cobraReason = $cobraReason;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCobraStatus()
    {
        return $this->cobraStatus;
    }

    /**
     * @param null|string $cobraStatus
     *
     * @return PersonDetail
     */
    public function setCobraStatus(?string $cobraStatus)
    {
        $this->cobraStatus = $cobraStatus;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCobraStatusDate()
    {
        return $this->cobraStatusDate;
    }

    /**
     * @param DateTime|null $cobraStatusDate
     *
     * @return PersonDetail
     */
    public function setCobraStatusDate(?DateTime $cobraStatusDate)
    {
        $this->cobraStatusDate = $cobraStatusDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCommunityBroadcastSmsCode()
    {
        return $this->communityBroadcastSmsCode;
    }

    /**
     * @param null|string $communityBroadcastSmsCode
     *
     * @return PersonDetail
     */
    public function setCommunityBroadcastSmsCode(?string $communityBroadcastSmsCode)
    {
        $this->communityBroadcastSmsCode = $communityBroadcastSmsCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isConsentElectronicW2()
    {
        return $this->consentElectronicW2;
    }

    /**
     * @param bool $consentElectronicW2
     *
     * @return PersonDetail
     */
    public function setConsentElectronicW2(bool $consentElectronicW2)
    {
        $this->consentElectronicW2 = $consentElectronicW2;

        return $this;
    }

    /**
     * @return bool
     */
    public function isConsentElectronicw2pr()
    {
        return $this->consentElectronicw2pr;
    }

    /**
     * @param bool $consentElectronicw2pr
     *
     * @return PersonDetail
     */
    public function setConsentElectronicw2pr(bool $consentElectronicw2pr)
    {
        $this->consentElectronicw2pr = $consentElectronicw2pr;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateDeceased()
    {
        return $this->dateDeceased;
    }

    /**
     * @param DateTime|null $dateDeceased
     *
     * @return PersonDetail
     */
    public function setDateDeceased(?DateTime $dateDeceased)
    {
        $this->dateDeceased = $dateDeceased;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfCobraEvent()
    {
        return $this->dateOfCobraEvent;
    }

    /**
     * @param DateTime|null $dateOfCobraEvent
     *
     * @return PersonDetail
     */
    public function setDateOfCobraEvent(?DateTime $dateOfCobraEvent)
    {
        $this->dateOfCobraEvent = $dateOfCobraEvent;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfCobraExport()
    {
        return $this->dateOfCobraExport;
    }

    /**
     * @param DateTime|null $dateOfCobraExport
     *
     * @return PersonDetail
     */
    public function setDateOfCobraExport(?DateTime $dateOfCobraExport)
    {
        $this->dateOfCobraExport = $dateOfCobraExport;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfCobraLetter()
    {
        return $this->dateOfCobraLetter;
    }

    /**
     * @param DateTime|null $dateOfCobraLetter
     *
     * @return PersonDetail
     */
    public function setDateOfCobraLetter(?DateTime $dateOfCobraLetter)
    {
        $this->dateOfCobraLetter = $dateOfCobraLetter;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfI9Expiration()
    {
        return $this->dateOfI9Expiration;
    }

    /**
     * @param DateTime|null $dateOfI9Expiration
     *
     * @return PersonDetail
     */
    public function setDateOfI9Expiration(?DateTime $dateOfI9Expiration)
    {
        $this->dateOfI9Expiration = $dateOfI9Expiration;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDatetimeChanged()
    {
        return $this->datetimeChanged;
    }

    /**
     * @param DateTime|null $datetimeChanged
     *
     * @return PersonDetail
     */
    public function setDatetimeChanged(?DateTime $datetimeChanged)
    {
        $this->datetimeChanged = $datetimeChanged;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDatetimeCreated()
    {
        return $this->datetimeCreated;
    }

    /**
     * @param DateTime|null $datetimeCreated
     *
     * @return PersonDetail
     */
    public function setDatetimeCreated(?DateTime $datetimeCreated)
    {
        $this->datetimeCreated = $datetimeCreated;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDisabilityType()
    {
        return $this->disabilityType;
    }

    /**
     * @param null|string $disabilityType
     *
     * @return PersonDetail
     */
    public function setDisabilityType(?string $disabilityType)
    {
        $this->disabilityType = $disabilityType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEthnicDescription()
    {
        return $this->ethnicDescription;
    }

    /**
     * @param null|string $ethnicDescription
     *
     * @return PersonDetail
     */
    public function setEthnicDescription(?string $ethnicDescription)
    {
        $this->ethnicDescription = $ethnicDescription;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFormerName()
    {
        return $this->formerName;
    }

    /**
     * @param null|string $formerName
     *
     * @return PersonDetail
     */
    public function setFormerName(?string $formerName)
    {
        $this->formerName = $formerName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHealthBloodType()
    {
        return $this->healthBloodType;
    }

    /**
     * @param null|string $healthBloodType
     *
     * @return PersonDetail
     */
    public function setHealthBloodType(?string $healthBloodType)
    {
        $this->healthBloodType = $healthBloodType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHealthEyes()
    {
        return $this->healthEyes;
    }

    /**
     * @param null|string $healthEyes
     *
     * @return PersonDetail
     */
    public function setHealthEyes(?string $healthEyes)
    {
        $this->healthEyes = $healthEyes;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHealthHair()
    {
        return $this->healthHair;
    }

    /**
     * @param null|string $healthHair
     *
     * @return PersonDetail
     */
    public function setHealthHair(?string $healthHair)
    {
        $this->healthHair = $healthHair;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHealthHeightFeet()
    {
        return $this->healthHeightFeet;
    }

    /**
     * @param null|string $healthHeightFeet
     *
     * @return PersonDetail
     */
    public function setHealthHeightFeet(?string $healthHeightFeet)
    {
        $this->healthHeightFeet = $healthHeightFeet;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHealthHeightInches()
    {
        return $this->healthHeightInches;
    }

    /**
     * @param null|string $healthHeightInches
     *
     * @return PersonDetail
     */
    public function setHealthHeightInches(?string $healthHeightInches)
    {
        $this->healthHeightInches = $healthHeightInches;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getHealthLastDonateDate()
    {
        return $this->healthLastDonateDate;
    }

    /**
     * @param DateTime|null $healthLastDonateDate
     *
     * @return PersonDetail
     */
    public function setHealthLastDonateDate(?DateTime $healthLastDonateDate)
    {
        $this->healthLastDonateDate = $healthLastDonateDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getHealthWeight()
    {
        return $this->healthWeight;
    }

    /**
     * @param float $healthWeight
     *
     * @return PersonDetail
     */
    public function setHealthWeight(float $healthWeight)
    {
        $this->healthWeight = $healthWeight;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getI9AlienNumber()
    {
        return $this->i9AlienNumber;
    }

    /**
     * @param null|string $i9AlienNumber
     *
     * @return PersonDetail
     */
    public function setI9AlienNumber(?string $i9AlienNumber)
    {
        $this->i9AlienNumber = $i9AlienNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getI9DocA()
    {
        return $this->i9DocA;
    }

    /**
     * @param null|string $i9DocA
     *
     * @return PersonDetail
     */
    public function setI9DocA(?string $i9DocA)
    {
        $this->i9DocA = $i9DocA;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getI9DocB()
    {
        return $this->i9DocB;
    }

    /**
     * @param null|string $i9DocB
     *
     * @return PersonDetail
     */
    public function setI9DocB(?string $i9DocB)
    {
        $this->i9DocB = $i9DocB;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getI9DocC()
    {
        return $this->i9DocC;
    }

    /**
     * @param null|string $i9DocC
     *
     * @return PersonDetail
     */
    public function setI9DocC(?string $i9DocC)
    {
        $this->i9DocC = $i9DocC;

        return $this;
    }

    /**
     * @return bool
     */
    public function isI9Verified()
    {
        return $this->i9Verified;
    }

    /**
     * @param bool $i9Verified
     *
     * @return PersonDetail
     */
    public function setI9Verified(bool $i9Verified)
    {
        $this->i9Verified = $i9Verified;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getI9VisaType()
    {
        return $this->i9VisaType;
    }

    /**
     * @param null|string $i9VisaType
     *
     * @return PersonDetail
     */
    public function setI9VisaType(?string $i9VisaType)
    {
        $this->i9VisaType = $i9VisaType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getI9WorkAuth()
    {
        return $this->i9WorkAuth;
    }

    /**
     * @param null|string $i9WorkAuth
     *
     * @return PersonDetail
     */
    public function setI9WorkAuth(?string $i9WorkAuth)
    {
        $this->i9WorkAuth = $i9WorkAuth;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @param bool $isDisabled
     *
     * @return PersonDetail
     */
    public function setIsDisabled(bool $isDisabled)
    {
        $this->isDisabled = $isDisabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMultiPayGroup()
    {
        return $this->isMultiPayGroup;
    }

    /**
     * @param bool $isMultiPayGroup
     *
     * @return PersonDetail
     */
    public function setIsMultiPayGroup(bool $isMultiPayGroup)
    {
        $this->isMultiPayGroup = $isMultiPayGroup;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSmoker()
    {
        return $this->isSmoker;
    }

    /**
     * @param bool $isSmoker
     *
     * @return PersonDetail
     */
    public function setIsSmoker(bool $isSmoker)
    {
        $this->isSmoker = $isSmoker;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMilitaryService()
    {
        return $this->militaryService;
    }

    /**
     * @param bool $militaryService
     *
     * @return PersonDetail
     */
    public function setMilitaryService(bool $militaryService)
    {
        $this->militaryService = $militaryService;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMilitaryBranchServed()
    {
        return $this->militaryBranchServed;
    }

    /**
     * @param null|string $militaryBranchServed
     *
     * @return PersonDetail
     */
    public function setMilitaryBranchServed(?string $militaryBranchServed)
    {
        $this->militaryBranchServed = $militaryBranchServed;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMilitaryEra()
    {
        return $this->militaryEra;
    }

    /**
     * @param null|string $militaryEra
     *
     * @return PersonDetail
     */
    public function setMilitaryEra(?string $militaryEra)
    {
        $this->militaryEra = $militaryEra;

        return $this;
    }

    /**
     * @return string
     */
    public function getMilitaryIsDisabledVet()
    {
        return $this->militaryIsDisabledVet;
    }

    /**
     * @param string $militaryIsDisabledVet
     *
     * @return PersonDetail
     */
    public function setMilitaryIsDisabledVet(string $militaryIsDisabledVet)
    {
        $this->militaryIsDisabledVet = $militaryIsDisabledVet;

        return $this;
    }

    /**
     * @return string
     */
    public function getMilitaryIsOthEligVet()
    {
        return $this->militaryIsOthEligVet;
    }

    /**
     * @param string $militaryIsOthEligVet
     *
     * @return PersonDetail
     */
    public function setMilitaryIsOthEligVet(string $militaryIsOthEligVet)
    {
        $this->militaryIsOthEligVet = $militaryIsOthEligVet;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMilitaryIsOthEligVetBasis()
    {
        return $this->militaryIsOthEligVetBasis;
    }

    /**
     * @param null|string $militaryIsOthEligVetBasis
     *
     * @return PersonDetail
     */
    public function setMilitaryIsOthEligVetBasis(?string $militaryIsOthEligVetBasis)
    {
        $this->militaryIsOthEligVetBasis = $militaryIsOthEligVetBasis;

        return $this;
    }

    /**
     * @return string
     */
    public function getMilitaryIsActiveWartimeVet()
    {
        return $this->militaryIsActiveWartimeVet;
    }

    /**
     * @param string $militaryIsActiveWartimeVet
     *
     * @return PersonDetail
     */
    public function setMilitaryIsActiveWartimeVet(string $militaryIsActiveWartimeVet)
    {
        $this->militaryIsActiveWartimeVet = $militaryIsActiveWartimeVet;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNameFormer()
    {
        return $this->nameFormer;
    }

    /**
     * @param null|string $nameFormer
     *
     * @return PersonDetail
     */
    public function setNameFormer(?string $nameFormer)
    {
        $this->nameFormer = $nameFormer;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPreviousSSN()
    {
        return $this->previousSSN;
    }

    /**
     * @param null|string $previousSSN
     *
     * @return PersonDetail
     */
    public function setPreviousSSN(?string $previousSSN)
    {
        $this->previousSSN = $previousSSN;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     * @param null|string $originCountry
     *
     * @return PersonDetail
     */
    public function setOriginCountry(?string $originCountry)
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOriginLocation()
    {
        return $this->originLocation;
    }

    /**
     * @param null|string $originLocation
     *
     * @return PersonDetail
     */
    public function setOriginLocation(?string $originLocation)
    {
        $this->originLocation = $originLocation;

        return $this;
    }

    /**
     * @return bool
     */
    public function isW2IsDeceased()
    {
        return $this->w2IsDeceased;
    }

    /**
     * @param bool $w2IsDeceased
     *
     * @return PersonDetail
     */
    public function setW2IsDeceased(bool $w2IsDeceased)
    {
        $this->w2IsDeceased = $w2IsDeceased;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCobraNotes()
    {
        return $this->cobraNotes;
    }

    /**
     * @param null|string $cobraNotes
     *
     * @return PersonDetail
     */
    public function setCobraNotes(?string $cobraNotes)
    {
        $this->cobraNotes = $cobraNotes;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressSms()
    {
        return $this->addressSms;
    }

    /**
     * @param null|string $addressSms
     *
     * @return PersonDetail
     */
    public function setAddressSms(?string $addressSms)
    {
        $this->addressSms = $addressSms;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getMilitarySeparationDate()
    {
        return $this->militarySeparationDate;
    }

    /**
     * @param DateTime|null $militarySeparationDate
     *
     * @return PersonDetail
     */
    public function setMilitarySeparationDate(?DateTime $militarySeparationDate)
    {
        $this->militarySeparationDate = $militarySeparationDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHomePhoneIsPrivate()
    {
        return $this->homePhoneIsPrivate;
    }

    /**
     * @param bool $homePhoneIsPrivate
     *
     * @return PersonDetail
     */
    public function setHomePhoneIsPrivate(bool $homePhoneIsPrivate)
    {
        $this->homePhoneIsPrivate = $homePhoneIsPrivate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSmsApprovals()
    {
        return $this->smsApprovals;
    }

    /**
     * @param bool $smsApprovals
     *
     * @return PersonDetail
     */
    public function setSmsApprovals(bool $smsApprovals)
    {
        $this->smsApprovals = $smsApprovals;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSmsPayNotification()
    {
        return $this->smsPayNotification;
    }

    /**
     * @param bool $smsPayNotification
     *
     * @return PersonDetail
     */
    public function setSmsPayNotification(bool $smsPayNotification)
    {
        $this->smsPayNotification = $smsPayNotification;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getI9VisaExpirationDate()
    {
        return $this->i9VisaExpirationDate;
    }

    /**
     * @param DateTime|null $i9VisaExpirationDate
     *
     * @return PersonDetail
     */
    public function setI9VisaExpirationDate(?DateTime $i9VisaExpirationDate)
    {
        $this->i9VisaExpirationDate = $i9VisaExpirationDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMilitaryIsMedalVet()
    {
        return $this->militaryIsMedalVet;
    }

    /**
     * @param null|string $militaryIsMedalVet
     *
     * @return PersonDetail
     */
    public function setMilitaryIsMedalVet(?string $militaryIsMedalVet)
    {
        $this->militaryIsMedalVet = $militaryIsMedalVet;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastNameNotSameAsSSCard()
    {
        return $this->lastNameNotSameAsSSCard;
    }

    /**
     * @param null|string $lastNameNotSameAsSSCard
     *
     * @return PersonDetail
     */
    public function setLastNameNotSameAsSSCard(?string $lastNameNotSameAsSSCard)
    {
        $this->lastNameNotSameAsSSCard = $lastNameNotSameAsSSCard;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getChkCashingInstCode()
    {
        return $this->chkCashingInstCode;
    }

    /**
     * @param null|string $chkCashingInstCode
     *
     * @return PersonDetail
     */
    public function setChkCashingInstCode(?string $chkCashingInstCode)
    {
        $this->chkCashingInstCode = $chkCashingInstCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNationality1()
    {
        return $this->nationality1;
    }

    /**
     * @param null|string $nationality1
     *
     * @return PersonDetail
     */
    public function setNationality1(?string $nationality1)
    {
        $this->nationality1 = $nationality1;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNationality2()
    {
        return $this->nationality2;
    }

    /**
     * @param null|string $nationality2
     *
     * @return PersonDetail
     */
    public function setNationality2(?string $nationality2)
    {
        $this->nationality2 = $nationality2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNationality3()
    {
        return $this->nationality3;
    }

    /**
     * @param null|string $nationality3
     *
     * @return PersonDetail
     */
    public function setNationality3(?string $nationality3)
    {
        $this->nationality3 = $nationality3;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param null|string $userName
     *
     * @return PersonDetail
     */
    public function setUserName(?string $userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null|string $firstName
     *
     * @return PersonDetail
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param null|string $middleName
     *
     * @return PersonDetail
     */
    public function setMiddleName(?string $middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null|string $lastName
     *
     * @return PersonDetail
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPreferredName()
    {
        return $this->preferredName;
    }

    /**
     * @param null|string $preferredName
     *
     * @return PersonDetail
     */
    public function setPreferredName(?string $preferredName)
    {
        $this->preferredName = $preferredName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNamePrefixCode()
    {
        return $this->namePrefixCode;
    }

    /**
     * @param null|string $namePrefixCode
     *
     * @return PersonDetail
     */
    public function setNamePrefixCode(?string $namePrefixCode)
    {
        $this->namePrefixCode = $namePrefixCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNameSufixCode()
    {
        return $this->nameSufixCode;
    }

    /**
     * @param null|string $nameSufixCode
     *
     * @return PersonDetail
     */
    public function setNameSufixCode(?string $nameSufixCode)
    {
        $this->nameSufixCode = $nameSufixCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param null|string $emailAddress
     *
     * @return PersonDetail
     */
    public function setEmailAddress(?string $emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmailAddressAlternate()
    {
        return $this->emailAddressAlternate;
    }

    /**
     * @param null|string $emailAddressAlternate
     *
     * @return PersonDetail
     */
    public function setEmailAddressAlternate(?string $emailAddressAlternate)
    {
        $this->emailAddressAlternate = $emailAddressAlternate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * @param null|string $homePhone
     *
     * @return PersonDetail
     */
    public function setHomePhone(?string $homePhone)
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHomePhoneCountry()
    {
        return $this->homePhoneCountry;
    }

    /**
     * @param null|string $homePhoneCountry
     *
     * @return PersonDetail
     */
    public function setHomePhoneCountry(?string $homePhoneCountry)
    {
        $this->homePhoneCountry = $homePhoneCountry;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param null|string $addressLine1
     *
     * @return PersonDetail
     */
    public function setAddressLine1(?string $addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param null|string $addressLine2
     *
     * @return PersonDetail
     */
    public function setAddressLine2(?string $addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * @param null|string $addressCity
     *
     * @return PersonDetail
     */
    public function setAddressCity(?string $addressCity)
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param null|string $addressState
     *
     * @return PersonDetail
     */
    public function setAddressState(?string $addressState)
    {
        $this->addressState = $addressState;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressZipCode()
    {
        return $this->addressZipCode;
    }

    /**
     * @param null|string $addressZipCode
     *
     * @return PersonDetail
     */
    public function setAddressZipCode(?string $addressZipCode)
    {
        $this->addressZipCode = $addressZipCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param null|string $addressCountry
     *
     * @return PersonDetail
     */
    public function setAddressCountry(?string $addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressCounty()
    {
        return $this->addressCounty;
    }

    /**
     * @param null|string $addressCounty
     *
     * @return PersonDetail
     */
    public function setAddressCounty(?string $addressCounty)
    {
        $this->addressCounty = $addressCounty;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param DateTime|null $dateOfBirth
     *
     * @return PersonDetail
     */
    public function setDateOfBirth(?DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param null|string $gender
     *
     * @return PersonDetail
     */
    public function setGender(?string $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEthnicIDCode()
    {
        return $this->ethnicIDCode;
    }

    /**
     * @param null|string $ethnicIDCode
     *
     * @return PersonDetail
     */
    public function setEthnicIDCode(?string $ethnicIDCode)
    {
        $this->ethnicIDCode = $ethnicIDCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMaritalStatusCode()
    {
        return $this->maritalStatusCode;
    }

    /**
     * @param null|string $maritalStatusCode
     *
     * @return PersonDetail
     */
    public function setMaritalStatusCode(?string $maritalStatusCode)
    {
        $this->maritalStatusCode = $maritalStatusCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    /**
     * @param null|string $ssn
     *
     * @return PersonDetail
     */
    public function setSsn(?string $ssn)
    {
        $this->ssn = '***-**-' . substr($ssn, -4);

        return $this;
    }

    /**
     * @return bool
     */
    public function isSsnIsSuppressed()
    {
        return $this->ssnIsSuppressed;
    }

    /**
     * @param bool $ssnIsSuppressed
     *
     * @return PersonDetail
     */
    public function setSsnIsSuppressed(bool $ssnIsSuppressed)
    {
        $this->ssnIsSuppressed = $ssnIsSuppressed;

        return $this;
    }
}
