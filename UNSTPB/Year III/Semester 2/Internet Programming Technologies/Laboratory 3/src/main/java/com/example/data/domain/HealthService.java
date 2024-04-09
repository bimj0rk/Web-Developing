package com.example.data.domain;

import jakarta.persistence.*;

@Entity
public class HealthService {
    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String description;
    private String type;

    @ManyToOne
    @JoinColumn(name = "medicalEncounter_id")
    private MedicalEncounter medicalEncounter;

    public HealthService() {}

    public HealthService(String description, String type, MedicalEncounter medicalEncounter) {
        this.description = description;
        this.type = type;
        this.medicalEncounter = medicalEncounter;
    }

    // Getters
    public Long getId() {
        return id;
    }

    public String getDescription() {
        return description;
    }

    public String getType() {
        return type;
    }

    public MedicalEncounter getMedicalEncounter() {
        return medicalEncounter;
    }

    // Setters
    public void setId(Long id) {
        this.id = id;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public void setType(String type) {
        this.type = type;
    }

    public void setMedicalEncounter(MedicalEncounter medicalEncounter) {
        this.medicalEncounter = medicalEncounter;
        if (medicalEncounter != null && !medicalEncounter.getHealthServices().contains(this)) {
            medicalEncounter.getHealthServices().add(this);
        }
    }
}
