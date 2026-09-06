<?php

namespace Panopto\UsageReporting;

class RecurringStatsReportDefinition
{

    /**
     * @var RecurringReportCadence|null $Cadence
     */
    protected $Cadence = null;

    /**
     * @var string|null $DefinitionId
     */
    protected $DefinitionId = null;

    /**
     * @var bool|null $IsEnabled
     */
    protected $IsEnabled = null;

    /**
     * @var int|null $Offset
     */
    protected $Offset = null;

    /**
     * @var StatsReportType|null $ReportType
     */
    protected $ReportType = null;

    /**
     * @var ArrayOfStatsReportStatus|null $Reports
     */
    protected $Reports = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return RecurringReportCadence
     */
    public function getCadence()
    {
        return $this->Cadence;
    }

    /**
     * @param RecurringReportCadence $Cadence
     * @return RecurringStatsReportDefinition
     */
    public function setCadence($Cadence): RecurringStatsReportDefinition
    {
        $this->Cadence = $Cadence;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefinitionId()
    {
        return $this->DefinitionId;
    }

    /**
     * @param string $DefinitionId
     * @return RecurringStatsReportDefinition
     */
    public function setDefinitionId($DefinitionId): RecurringStatsReportDefinition
    {
        $this->DefinitionId = $DefinitionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->IsEnabled;
    }

    /**
     * @param bool $IsEnabled
     * @return RecurringStatsReportDefinition
     */
    public function setIsEnabled($IsEnabled): RecurringStatsReportDefinition
    {
        $this->IsEnabled = $IsEnabled;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->Offset;
    }

    /**
     * @param int $Offset
     * @return RecurringStatsReportDefinition
     */
    public function setOffset($Offset): RecurringStatsReportDefinition
    {
        $this->Offset = $Offset;
        return $this;
    }

    /**
     * @return StatsReportType
     */
    public function getReportType()
    {
        return $this->ReportType;
    }

    /**
     * @param StatsReportType $ReportType
     * @return RecurringStatsReportDefinition
     */
    public function setReportType($ReportType): RecurringStatsReportDefinition
    {
        $this->ReportType = $ReportType;
        return $this;
    }

    /**
     * @return ArrayOfStatsReportStatus
     */
    public function getReports()
    {
        return $this->Reports;
    }

    /**
     * @param ArrayOfStatsReportStatus $Reports
     * @return RecurringStatsReportDefinition
     */
    public function setReports($Reports): RecurringStatsReportDefinition
    {
        $this->Reports = $Reports;
        return $this;
    }

}
