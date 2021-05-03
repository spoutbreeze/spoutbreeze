package org.spoutbreeze.spoutbreezemanager.models;

import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonProperty;

public class BroadcastMessage {

    @JsonProperty("id")
    private Long id;

    @JsonProperty("selenoid_id")
    private String selenoidId;

    @JsonProperty("server_id")
    private String serverId;

    @JsonProperty("endpoint_id")
    private String endpointId;

    @JsonProperty("meeting_id")
    private String meetingId;

    @JsonProperty("created_on")
    private String createdOn;

    @JsonProperty("updated_on")
    private String updatedOn;

    @JsonIgnore
    private String userId;

    public BroadcastMessage() {
    }

    public String getEndpointId() {
        return endpointId;
    }

    public void setEndpointId(String endpointId) {
        this.endpointId = endpointId;
    }

    public String getMeetingId() {
        return meetingId;
    }

    public void setMeetingId(String meetingId) {
        this.meetingId = meetingId;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getSelenoidId() {
        return selenoidId;
    }

    public void setSelenoidId(String selenoidId) {
        this.selenoidId = selenoidId;
    }

    public String getServerId() {
        return serverId;
    }

    public void setServerId(String serverId) {
        this.serverId = serverId;
    }

    public String getCreatedOn() {
        return createdOn;
    }

    public void setCreatedOn(String createdOn) {
        this.createdOn = createdOn;
    }

    public String getUpdatedOn() {
        return updatedOn;
    }

    public void setUpdatedOn(String updatedOn) {
        this.updatedOn = updatedOn;
    }

    @Override
    public String toString() {
        return "BroadcastMessage{" +
                "id=" + id +
                ", selenoidId='" + selenoidId + '\'' +
                ", serverId='" + serverId + '\'' +
                ", endpointId='" + endpointId + '\'' +
                ", meetingId='" + meetingId + '\'' +
                ", createdOn='" + createdOn + '\'' +
                ", updatedOn='" + updatedOn + '\'' +
                ", userId='" + userId + '\'' +
                '}';
    }
}
