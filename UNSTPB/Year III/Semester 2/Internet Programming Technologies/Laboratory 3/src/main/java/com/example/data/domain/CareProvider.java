package com.example.data.domain;

import jakarta.persistence.*;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.util.HashSet;
import java.util.Set;

@Entity
@Data
@NoArgsConstructor
public class CareProvider {
    @Id
    @GeneratedValue
    private Long id;
    private String name;
    private String speciality;

    @OneToMany(mappedBy = "care_provider", cascade = CascadeType.PERSIST, fetch = FetchType.EAGER)
    private Set<MedicalEncounter> medicalEncounters = new HashSet<>();

    public CareProvider(String name, String speciality) {
        this.name = name;
        this.speciality = speciality;
    }
}